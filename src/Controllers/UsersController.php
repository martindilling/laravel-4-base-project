<?php namespace MDH\Base\Controllers;

use Hash;
use Illuminate\Events\Dispatcher;
use Input;
use MDH\Base\Exceptions\FormValidationException;
use MDH\Base\Sanitizers\UserSanitizer;
use MDH\Base\Validators\RegisterUserValidator;
use MDH\Base\Repositories\UserRepositoryInterface;
use Notification;
use Paginator;
use Redirect;
use View;

class UsersController extends BaseController {

    /**
     * Category Repository
     *
     * @var \MDH\Base\Repositories\UserRepositoryInterface
     */
    protected $users;

    /**
     * @var \MDH\Base\Sanitizers\UserSanitizer
     */
    private $userSanitizer;

    /**
     * @var \MDH\Base\Validators\RegisterUserValidator
     */
    protected $registerUserValidator;

    /**
     * @var \Illuminate\Events\Dispatcher
     */
    protected $events;

    /**
     * @param UserRepositoryInterface $users
     * @param UserSanitizer           $userSanitizer
     * @param RegisterUserValidator   $createUserValidator
     * @param Dispatcher              $events
     */
    function __construct(
        UserRepositoryInterface $users,
        UserSanitizer $userSanitizer,
        RegisterUserValidator $createUserValidator,
        Dispatcher $events)
    {
        $this->users                 = $users;
        $this->userSanitizer         = $userSanitizer;
        $this->registerUserValidator = $createUserValidator;
        $this->events                = $events;
    }

    /**
     * Display a listing of categories
     *
     * @return Response
     */
    public function index()
    {
        $page = Input::get('page', 1);
        $perPage = 5;

        $data = $this->users
            ->getByPage($page, $perPage, []);

        $paginator = Paginator::make($data->items, $data->totalItems, $perPage);

        $users = $paginator->getCollection();
        $pagination = (string) $paginator->links();

        return View::make('users.index', compact('users', 'pagination'));
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->users->find($id);

        return View::make('users.show', compact('user'));
    }


    /**
     * Show the form for registering a new user
     *
     * @return Response
     */
    public function register()
    {
        return View::make('users.register');
    }

    /**
     * Store a newly created category in storage.
     *
     * @return Response
     */
    public function postRegister()
    {
        $input = Input::all();

        $input = $this->userSanitizer->sanitize($input);

        try {
            $this->registerUserValidator->validate($input);
        } catch (FormValidationException $e) {
            return Redirect::back()
                ->withErrors($e->getErrors())
                ->withInput();
        }

        $input['password'] = Hash::make($input['password']);
        $user = $this->users->create($input);
        $this->events->fire('user.registered', array($user));

        Notification::success('You are now registered and can login.');
        return Redirect::route('login');
    }

}

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

}

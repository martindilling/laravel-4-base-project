<?php namespace MDH\Base\Controllers;

use Hash;
use Illuminate\Events\Dispatcher;
use Input;
use MDH\Base\Exceptions\FormValidationException;
use MDH\Base\Sanitizers\UserSanitizer;
use MDH\Base\Validators\RegisterUserValidator;
use MDH\Base\Repositories\UserRepositoryInterface;
use Notification;
use Redirect;
use View;

class RegistrationController extends BaseController {

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

        $user = $this->users->register($input);
        $this->events->fire('user.registered', array($user));

        Notification::success('You are now registered and can login.');
        return Redirect::route('login');
    }

}

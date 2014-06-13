<?php namespace MDH\Base\Controllers;

use Auth;
use Illuminate\Events\Dispatcher;
use Input;
use MDH\Base\Exceptions\FormValidationException;
use MDH\Base\Sanitizers\UserSanitizer;
use MDH\Base\Validators\LoginValidator;
use MDH\Base\Repositories\UserRepositoryInterface;
use Notification;
use Paginator;
use Redirect;
use View;

class SessionsController extends BaseController {

    /**
     * Category Repository
     *
     * @var \MDH\Base\Repositories\UserRepositoryInterface
     */
    protected $users;

    /**
     * @var \MDH\Base\Validators\LoginValidator
     */
    protected $loginValidator;

    /**
     * @var \Illuminate\Events\Dispatcher
     */
    protected $events;
    /**
     * @var \MDH\Base\Sanitizers\UserSanitizer
     */
    private $userSanitizer;

    /**
     * @param UserRepositoryInterface $users
     * @param UserSanitizer           $userSanitizer
     * @param LoginValidator          $loginValidator
     * @param Dispatcher              $events
     */
    function __construct(
        UserRepositoryInterface $users,
        UserSanitizer $userSanitizer,
        LoginValidator $loginValidator,
        Dispatcher $events
    ){
        $this->users                 = $users;
        $this->userSanitizer         = $userSanitizer;
        $this->loginValidator        = $loginValidator;
        $this->events                = $events;
    }

    /**
     * Show the form for creating a new category
     *
     * @return Response
     */
    public function create()
    {
        return View::make('sessions.login');
    }

    /**
     * Store a newly created category in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        $input = $this->userSanitizer->sanitize($input);

        $credentials = [
            'email'    => $input['email'],
            'password' => $input['password'],
        ];

        $remember = (isset($input['remember-me']) ? true : false);

        try {
            $this->loginValidator->validate($credentials);
        } catch (FormValidationException $e) {
            return Redirect::back()
                ->withErrors($e->getErrors())
                ->withInput();
        }

        $attempt = Auth::attempt($credentials, $remember);

        if (! $attempt) {
            Notification::danger('Invalid credentials!');
            return Redirect::back()
                ->withInput(Input::except('password'));
        }

        $this->events->fire('user.login', array(Auth::user()));
        Notification::success('You have been logged in!');
        return Redirect::intended(route('admin.dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy()
    {
        Auth::logout();

        return Redirect::home();
    }

}

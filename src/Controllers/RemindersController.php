<?php namespace MDH\Base\Controllers;

use App;
use Hash;
use Input;
use Lang;
use Notification;
use Password;
use Redirect;
use View;

class RemindersController extends BaseController {

    /**
     * Display the password reminder view.
     *
     * @return Response
     */
    public function getRemind()
    {
        return View::make('password.remind');
    }

    /**
     * Handle a POST request to remind a user of their password.
     *
     * @return Response
     */
    public function postRemind()
    {
        $response = Password::remind(Input::only('email'), function($message)
        {
            $message->subject('Password Reminder');
        });

        switch ($response)
        {
            case Password::INVALID_USER:
                Notification::danger(Lang::get($response));
                return Redirect::back();
            break;

            case Password::REMINDER_SENT:
                Notification::success(Lang::get($response));
                return Redirect::back();
            break;
        }
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return Response
     */
    public function getReset($token = null)
    {
        if (is_null($token)) App::abort(404);

        return View::make('password.reset')->with('token', $token);
    }

    /**
     * Handle a POST request to reset a user's password.
     *
     * @return Response
     */
    public function postReset()
    {
        $credentials = Input::only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function($user, $password)
        {
            $user->password = Hash::make($password);

            $user->save();
        });

        switch ($response)
        {
            case Password::INVALID_PASSWORD:
            case Password::INVALID_TOKEN:
            case Password::INVALID_USER:
                Notification::danger(Lang::get($response));
                return Redirect::back();
            break;

            case Password::PASSWORD_RESET:
                Notification::success(Lang::get($response));
                return Redirect::route('login');
            break;
        }
    }

}

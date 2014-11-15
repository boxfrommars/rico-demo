<?php
namespace Rico\Auth;

use Illuminate\Mail\Message;
use Mail;
use View;
use Config;
use Input;
use App;
use Lang;
use Redirect;
use Confide;
use OAuth;

/**
 * UsersController Class
 *
 * Для реализации остальных методов, см.
 *
 * Implements actions regarding user management
 */
class UsersController extends \Controller
{
    /**
     * Displays the login form
     *
     * @return  \Illuminate\Http\Response
     */
    public function login()
    {
        if (Confide::user()) {
            return Redirect::to('/admin');
        } else {
            return View::make(Config::get('confide::login_form'));
        }
    }

    /**
     * Attempt to do login
     *
     * @return  \Illuminate\Http\Response
     */
    public function doLogin()
    {
        /** @var UserRepository $repo */
        $repo = App::make('\Rico\Auth\UserRepository');
        $input = Input::all();

        if ($repo->login($input)) {
            return Redirect::intended('/admin');
        } else {
            if ($repo->isThrottled($input)) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ($repo->existsButNotConfirmed($input)) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::route('login')->withInput(Input::except('password'))->with('error', $err_msg);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return  \Illuminate\Http\Response
     */
    public function logout()
    {
        Confide::logout();
        return Redirect::to('/');
    }
}

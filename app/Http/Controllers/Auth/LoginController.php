<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Redirect;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    public function dologin(Request $request)
    {
        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'),

        ], $remember)) {

            if (Auth::user()->can('can.login')) {

                return Redirect::intended('dashboard');

            } else {

                Auth::logout();
                return back()->with('blocked', 'Login access blocked !');
            }
        } else {
            $errors = new MessageBag(['email' => ['Email or password is invalid.']]);
            return Redirect::back()->withErrors($errors)->withInput($request->except('password'));
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback($service)
    {
        try {
            $userSocial = Socialite::driver($service)->stateless()->user();
        } catch (\Exception $error) {
            $userSocial = Socialite::driver($service)->user();
        }

        $find_user = User::where('email', $userSocial->email)->first();

        if ($find_user) {
            Auth::login($find_user);
            if ($find_user->hasRole('Super Admin')) {
                return Redirect::intended('dashboard');
            } elseif ($find_user->hasRole('Trainer')) {
                return Redirect::intended('dashboard');
            } else {
                return Redirect::intended('dashboard');
            }
        } else {

            $user = new User;
            $user->name = $userSocial->name;
            $user->email = $userSocial->email != '' ? $userSocial->email : $userSocial->name . '@' . $service . '.com';
            $user->password = bcrypt(123456);
            $user->save();

            try {

                Mail::to($user['email'])->send(new WelcomeUser($user));

            } catch (\Swift_TransportException $e) {

            } catch (\Exception $e) {

            }

            $this->guard()->login($user);
            return 'Next Profile Page !';

        }
    }
}

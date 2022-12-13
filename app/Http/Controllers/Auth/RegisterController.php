<?php

namespace App\Http\Controllers\Auth;

use App\Affilates;
use App\Country;
use App\Http\Controllers\Controller;
use App\Notifications\NewUserNotification;
use App\Providers\RouteServiceProvider;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $af_system = Affilates::first();
        $countries = Country::all();
        return view('auth.register', compact('countries', 'af_system'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'term' => ['required'],
        ], [
            'term' => 'Oops ! you are not agree with our terms !',
        ]
        );

        $af_system = Affilates::first();

        if ($af_system && $af_system->status == '1') {
              $findreferal = User::where('refer_code', $request['refer_code'])->first();
            if (!$findreferal) {
                return back()->withInput()->withErrors([
                    'refercode' => 'Refer code is invalid !',
                ]);

            }

        }
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'uuid' => (string) Str::orderedUuid(),
            'mobile' => $request['mobile'],
            'refer_from' => $af_system && $af_system->status == '1' ? $request['refer_code'] : null,
        ]);
        $user->assignRole('User');
        if ($af_system && $af_system->status == '1') {
             $findreferal->getReferals()->create([
                'log' => 'Refer successfull',
                'refer_user_id' => $user->id,
                'user_id' => $findreferal->id,
                'amount' => $af_system->per_referral,
            ]);
        }

        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'Super Admin');
            }
        )->get();
        $name = $user->name;
        Notification::send($users, new NewUserNotification($name));
        return redirect('/');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

}

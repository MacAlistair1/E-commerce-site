<?php

namespace App\Http\Controllers\Auth;

use Mail;
use Session;
use App\User;
use App\Mail\verifyEmail;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'contact' => 'required|string|max:15|min:10',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255|min:3',
            'province' => 'required|integer|max:6|min:1',
            'postal' => 'nullable|string|max:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('success', 'Registered!, Now Login with your Credentials!');
       return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verifytoken' => Str::random(40),
            'contact' => $data['contact'],
            'company' => $data['company'],
            'address' => $data['address'],
            'city' => $data['city'],
            'postal' => $data['postal'],
            'country' => $data['country'],
            'province' => $data['province'],
        ]);

        /* $thisUser = User::findOrFail($user->id);
        $this->sendMail($thisUser);
        return $user; */
    }

    public function sendMail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function sendEmailDone($email, $token)
    {
        $user = User::where(['email' => $email, 'verifytoken' => $token])->first();
        if ($user) {
            $user->status = '1';
            $user->verifytoken = null;
            $user->save();

            return redirect(route('login'));
        }else{
            Session::flash('status-err', 'User Not Found!!');
            return redirect(route('login'));
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\OwnerDetail;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        //return $request->only($this->username(), 'password');

        return ['email' => $request->{$this->username()}, 'password' =>$request->password, 'status' => '1'];
    }

   

    public function all_details(){
        $owner = OwnerDetail::first();
        Session::flash('contact', $owner->contact);
        Session::flash('email', $owner->email);
        Session::flash('location', $owner->location);
        Session::flash('name', $owner->name);
        Session::flash('about', $owner->about_us);
        Session::flash('open_close', $owner->opening_closing_day);
        Session::flash('fb_url', $owner->fb_url);
        Session::flash('twitter_url', $owner->twitter_url);
        Session::flash('insta_url', $owner->insta_url);
        Session::flash('yt_url', $owner->yt_url);
        Session::flash('gplus_url', $owner->gplus_url);
        Session::flash('logo', $owner->logo);
        Session::flash('head_title', $owner->top_heading_title);
    }

      /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $this->all_details();
        return view('auth.login');
    }
     
}

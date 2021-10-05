<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


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
        // $this->middleware('guest')->except('logout');
    }
    public function formLogin(){
        // dd('aa');
		return view('login.formlogin');
	}
    public function postLogin(Request $request){

		if(Auth::attempt(
            [
                	'nip' => $request->email,
                	'password' => $request->password,
                ]
        )){
			return redirect()->intended(url('/post'));
		}
        return view('login.formlogin');
    }
    public function logout()
    {
        Auth::logout(); 
        return redirect()->route('login');
    }
}

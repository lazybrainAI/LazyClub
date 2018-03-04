<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\User;

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
//
//    use AuthenticatesUsers;
//
//    /**
//     * Where to redirect users after login.
//     *
//     * @var string
//     */
//    protected $redirectTo = '/home';
//
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
    public function getLogin()
    {
        return view('login');
    }
    public function postLogin(Request $request){


        $userValid = $request->validate(['email'=>'required|email', 'password' => 'required|min:6']);


        $user = User::where([['email', '=', Input::get('email')], ['password', '=', Input::get('password')]])->first();
        if ($user && $userValid) {
            return redirect('/home');
        }

        else
            return redirect('/');

}
}

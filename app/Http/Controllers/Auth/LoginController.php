<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


        $this->middleware('guest')->except('logout');
    }
    protected function redirectTo()
    {
        if (auth()->user()->is_admin == 1) {
            return '/admin';
        }
        return '/errors';
    }
    // public function postLogin(Request $request){
    //     $arr = ['email' => $request->email, 'password' => $request->password];
    //     if(Auth::attempt($arr)){
    //         return redirect()->intended('admin');
    //     }else{
    //         return back()->withInput->with('error', 'TK mk k đúng');

    //         }

    //     }
}

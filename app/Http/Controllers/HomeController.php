<?php

namespace App\Http\Controllers;

use App\Jobs\SentReminderEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Foundation\Auth\User as AuthUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $brands = Brand::all();
        return view('wellcome', ['products' => $products,
        'brands' => $brands]);
    }
    public function SentReminderEmail(){
        $user = new AuthUser();
        $user->name = "Luong";
        $user->mail = "luong@example.com";
        $user->password = "password";
        $user->level = 1; 
        $job = (new SentReminderEmail($user))->delay(60);
        dd($job);
        $this->dispatch($job);
       }
    public function errors()
    {
        return view('errors');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->intended('login');
    }


}

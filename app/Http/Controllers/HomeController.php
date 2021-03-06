<?php

namespace Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Backend\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        /*
        * Filter that allow to access a determinate request
        * param is a string name on App\http\kernel
        */
        $this->middleware('auth');
        $this->middleware('is.customer', ['except' => ['index', 'profile']]);
        $this->middleware('is.not.customer', ['except' => ['dashboard', 'profile']]);
        $this->middleware('is.active');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('home');
    }

    public function dashboard(){
        return view('home.index');
    }

    public function profile(){
        $user = User::find(Auth::user()->id);
        return view('profile.index');
    }
}

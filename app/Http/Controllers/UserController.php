<?php

namespace App\Http\Controllers;

use App\Events\UserSignedUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function homePage()
    {
        event( new UserSignedUp('jhondoe') );

        return view('welcome');
    }

    /**
     * Get own user data
     */
    public function me()
    {
        return auth()->user();
    }
}

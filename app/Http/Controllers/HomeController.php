<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Middleware\RoleMiddleware;

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
        return view('home');
    }

    public function AccessDenied()
    {
        return view('errors.access-denied');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
<<<<<<< HEAD
        
        $this->middleware('Freelancer');
        $this->middleware('client');
        
=======
        $this->middleware('admin');
        $this->middleware('Freelancer');
        $this->middleware('client');
>>>>>>> old_a/master
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< HEAD
        return view('welcome');
=======
        return view('imageManipulation');
>>>>>>> old_a/master
    }
}

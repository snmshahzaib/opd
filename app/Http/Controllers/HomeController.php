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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('patient');
    }
    public function doctor() {
        return view('doctor');
    }
    // public function patient( ) {
    //     return view('patient');
    // }
    public function admin( ) {
        return view('admin');
    }
}

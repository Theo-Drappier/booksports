<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings;
use Illuminate\Support\Facades\Auth;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Bookings::where('user_id', Auth::user()->id)->get();
        return view('home', compact('bookings'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListBookingController extends Controller
{
    public function index() {
        return view('listbooking');
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AddAssociationController extends Controller
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

    public function index()
    {
        $users = User::where([
            ['role', '=', 1]
        ])->get();
        return view('createassoc', ['users' => $users]);
    }

    public function send(Request $request)
    {

    }
}

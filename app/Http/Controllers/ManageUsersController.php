<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
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
        $users = User::all();
        return view('manageuser', ['users' => $users]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->idUser);
        $user->role = $request->roleUser;
        $user->save();
        return $user;
    }
}

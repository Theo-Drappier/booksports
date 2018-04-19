<?php

namespace App\Http\Controllers;

use App\User;
use App\AssociationUser;
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
        if (AssociationUser::where('user_id', $user->id)->get()->count() > 1 && $request->roleUser == 1)
        {
            $error = ['state' => 'error'];
            return $error;
        } else {
            $user->role = $request->roleUser;
            $user->save();
            return $user;
        }
    }
}

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
        $users = User::where([
            ['role', '>', 1]
        ])->get();
        return view('manageuser', ['users' => $users]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->idUser);
        if (!AssociationUser::where('user_id', $user)->get()->count() < 2)
        {
            $user->role = $request->roleUser;
            $user->save();
            return $user;
        } else {
            $message = 'A manager association must have only one association linked. But this account got more than one association';
            return $message;
        }
    }
}

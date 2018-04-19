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

    /**
     * Controller of the page users management
     * @return view
     */
    public function index()
    {
        $users = User::all();
        return view('manageuser', ['users' => $users]);
    }

    /**
     * Controller of the user role update
     * @param  Request $request Contain
     * @return state
     */
    public function update(Request $request)
    {
        $user = User::find($request->idUser);
        // If the user is linked to more than one association and we want to give him the role "Manager Association",
        // We don't make the update because a manager association must have one assocation linked 
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

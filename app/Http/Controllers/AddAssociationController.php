<?php

namespace App\Http\Controllers;

use App\User;
use App\Associations;
use App\AssociationUser;
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
        $users = User::where('role', 1)->get();
        return view('createassoc', ['users' => $users]);
    }

    /**
     * Create a new association + link with a user
     * @param  Request $request The post body
     * @return Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $name = $request->name;
        $userId = $request->user;
        if(AssociationUser::where('user_id', $userId)->get()->count() > 0)
        {
            $message = "Error, this account is already linked to one association !";
            return redirect()->route('createassoc')->with('message', $message);
        }
        $association = new Associations;
        $association->name = $name;
        $association->save();
        $associationUser = new AssociationUser;
        $associationUser->user_id = $userId;
        $associationUser->association_id = $association->id;
        $associationUser->save();
        return redirect('home');
    }
}
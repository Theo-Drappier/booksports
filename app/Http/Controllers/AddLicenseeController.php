<?php

namespace App\Http\Controllers;

use App\User;
use App\AssociationUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AddLicenseeController extends Controller
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
     * Controller of the add licencee page
     * @return [type] [description]
     */
    public function index()
    {
        $associationUserExist = AssociationUser::where('user_id', Auth::user()->id)->first();
        $idAssociation = $associationUserExist->association_id;
        // Get all user who are not linked to the association to create the combo box
        $usersToAdd = User::where('role', 5)->whereNotIn('id', function($query) use($idAssociation) {
            $query->select('user_id')
            ->from('association_user')
            ->where('association_id', $idAssociation);
        })->get();
        // Get all user who are linked to the association to create the list
        $usersRegister = User::whereIn('id', function($query) use($idAssociation) {
            $query->select('user_id')
            ->from('association_user')
            ->where('association_id', $idAssociation);
        })->get();
        return view('addlicensee', ['usersAdd' => $usersToAdd, 'usersRegister' => $usersRegister]);
    }

    /**
     * Controller to create the link between user selected and the association
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function send(Request $request)
    {
        $user = $request->user;
        // A user with role "Manager Association" can be link just to one association
        $associationUserExist = AssociationUser::where('user_id', Auth::user()->id)->first();
        $associationUser = new AssociationUser;
        $associationUser->association_id = $associationUserExist->association_id;
        $associationUser->user_id = $user;
        $associationUser->save();
        return redirect()->route('addlicensee');
    }
}

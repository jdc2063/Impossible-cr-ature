<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\Species;
use App\Models\Animal;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserController extends Controller
{

    # Enregistrement d'un nouvel utilisateur (Inscription)
    function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required', 
            'password' => 'required',
        ]);
           
        if ($validator->fails()) {
            return response()->json([
                'message' => "A field is missing",
            ], 400);
        } else {

            # Appelle une fonction du model User pour enregistrer la request dans une variable user
            $user = User::createDTOtoOBJECT($request);

            $user->save();
            return response($user, 201);
        }
    }

    # Authentification
    function Auth(Request $request) {
        $username = $request->username;
        $user = User::where('username', $username)->get();

        # On vérifie si l'username existe
        if ($user == "[]") {
            return response()->json([
                'message' => "Username not find"
            ], 400);
        }

        # On vérifie si il y a bien un mot de passe d'entrée
        if ($request->password == NULL) {
            return response()->json([
                'message' => "Password is missing"
            ], 400);
        }

        # On vérifie si le mot de passe correspond
        $verif = Hash::check($request->password, $user[0]->password);
        if ($verif == true) {
            return response()->json([
                'message' => "Vous êtes identifié",
                'user_id' => $user[0]->id
            ], 200);
        } else {
            return response()->json([
                'message' => "Wrong password"
            ], 400);
        }
    }

    # Afficher les x premiers utilisateurs selon les points
    function getuserbyPoint($x) {
        return(User::all()
            ->sortByDesc('point')
            ->take($x)
        );
    }
}

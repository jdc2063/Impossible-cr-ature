<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Animal;
use App\Models\Transaction;
use App\Models\User;

class AnimalController extends Controller

{
    #Affiche tous les animaux
    function show() {
        return Animal::all();
    }

    # Créer un nouvel animal
    function create(Request $request) {
        $validator = Validator::make($request ->all(), [
            'species' => 'required',
            'creator' => 'required',
            'owner' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
            'message' => "A field is missing",
            ], 400);
        } else {
            # Appelle une fonction du model Animal
            $create = Animal::createDTOtoOBJECT($request);
            $create-> save();
            return response ($create, 201);
        }
    }

    # Modifie un animal
    function modify(Request $request, $id){
        $animal= Animal::find($id);
        if($animal) {
            $modify = Animal::modifyDTOtoOBJECT($request, $animal);
            $modify->save();
            return response ($modify, 200);
        } else {
            return response()->json([
                'message' => "Animal doesn't exist",
            ], 400);
        } 
    }

    # Supprime un animal
    function delete($id) {
        $animal= Animal::find($id);
        if($animal) {
            $animal->delete();
        } else {
            return response()->json([
                'message' => "Incorrect ID",
            ], 400);
        }
    }

    # Affiche tous les animaux possédés par un utilisateur
    function search($user_owner_id){
        $search= Animal::where('user_owner_id', $user_owner_id)->get();
        return response ($search, 200);
    }

    # Affiche tous qui ont possédé un animal donné
    function searchAnimal($id) {

        # On va chercher toutes les transactions qui ont eu comme échange notre animal
        # Car qui dit acheté dit possédé
        $transaction= Transaction::where('animal_sold_id', $id)->get();

        # On crée une colletion vide qui recevra les id des acheteurs
        $user_id_list = collect([]);

        # On vérifie si il y a bien des transactions de notre animal
        if ($transaction) {

            # Pour chaque transaction trouvé, on enregistre dans la collection vide l'id de l'acheteur
            foreach ($transaction as $transaction) {
                $user_id_list = $user_id_list->concat(["$transaction->buyer_user_id"]);
            }

            # On crée une collection vide qui recevra les informations des acheteurs
            $user_list = collect([]);

            # Pour chaque id d'acheteur enregistré, on enregistre dans la nouvelle collection les informations
            foreach ($user_id_list as $user_id_list) {
                $user = User::find($user_id_list);
                $user_list = $user_list->concat([$user]);
            }
        }

        # On a vérifié les acheteurs, mais il ne faut pas oublié le créator
        # Donc on va chercher les informations de l'animal en question
        $id_owner = Animal::find($id);

        # Si il existe bien, on récupere l'id de son créateur et on l'ajoute a la collection
        if ($id_owner) {
            $id_owner = $id_owner->user_creator_id;
            $user = User::find($id_owner);
            $user_list = $user_list->concat([$user]);
        }

        # On return les informations des possésseurs passé et présent 
        # Et pour éviter les doublons, on ajoute "->unique()"
        return ($user_list->unique());
    }
}

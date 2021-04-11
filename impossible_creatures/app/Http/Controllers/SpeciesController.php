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

class SpeciesController extends Controller
{
    # Affiche toutes les espèces
    function getAll() {
        return Species::all();
    }

    # Créer une nouvelle espèce
    function create(Request $request) {

        # Vérifie si toutes les informations nécessaires sont entrées
        $validator = Validator::make($request->all(), [
            'name' => 'required', 
            'parent1' => 'required',
            'parent2' => 'required',
            'creator' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => "A field is missing"
            ], 400);
        } else {

            # Appelle une fonction situé dans le model User
            $species = Species::createDTOtoOBJECT($request);

            $species->save();
            return response($species, 201);
        }
    }

    function update(Request $request, $id) {

        # Cherche l'espèce concernée
        $species = Species::find($id);
        
        # Vérifie si l'espèce existe
        if ($species) {
            $species = species::updateDTOtoOBJECT($request, $species);
            if ($species == "400") {
                return response()->json([
                    'message' => "Name species already exist."
                ], 400); 
            }
            $species->save();

            return response($species, 200);
        } else {
            return response()->json([
                'message' => "Species doesn't exist."
            ], 400);
        }
    }

    # Supprime une espèce
    function delete($id) {

        # Vérifie si l'espèce existe
        $species = Species::find($id);
        if ($species) {
            $species->delete();
        } else {
            return response()->json([
                'message' => "Species doesn't exist."
            ], 400); 
        }
    
    }

    # Affiche tous les espèces créer par l'utilisateur avec l'id envoyé
    function getbyId($id) {
        return (Species::where('user_id', $id)->get());
    }
}

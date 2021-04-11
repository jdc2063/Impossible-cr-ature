<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animal extends Model
{
    use HasFactory;

    static function createDTOtoOBJECT($request) {

        # On crée un nouvel animal
        $animal = new Animal;
        
        # On copie les informations donné par la request
        $animal->species_id= $request->species;
        $animal->user_creator_id = $request->creator;
        $animal->user_owner_id = $request->owner;
    
        return $animal;
    }

    static function modifyDTOtoOBJECT($request, $animal)
    {
        # Pour chaque information, on vérifie son existence dans la request
        # Si elle existe, on applique le changement
        if ($request->species) 
            $animal->species_id= $request->species;
        if ($request->creator) 
            $animal->user_creator_id = $request->creator;
        if ($request->owner) 
            $animal->user_owner_id = $request->owner;
            
        return $animal;
    }
}

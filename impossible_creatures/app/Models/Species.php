<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\Species;
use App\Models\Animal;
class Species extends Model
{
    use HasFactory;
    static function createDTOtoOBJECT($request) {
        $species = new Species;

        $species->name = $request->name;
        $species->parent1_id = $request->parent1;
        $species->parent2_id = $request->parent2;
        $species->user_id = $request->creator;

        return $species;
    }
    
    static function updateDTOtoOBJECT($request, $species) {

        if ($request->name)    
            $species->name = $request->name;
        if ($request->parent1)
            $species->parent1_id = $request->parent1;
        if ($request->parent2)
            $species->parent2_id = $request->parent2;
        if ($request->creator)
            $species->user_id = $request->creator;
        return $species;
    }
}

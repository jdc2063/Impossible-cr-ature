<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;
use App\Models\User;
use App\Models\Species;
use Illuminate\Database\Eloquent\Model;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    static function createDTOtoOBJECT($request) {

        # Créer un nouvel utilisateur
        $user = new User;

        # Entre les informations du request et initialise les points et les golds
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->point = 0;
        $user->gold = 0;

        # Return le nouvel utilisateur pour l'enregistrer
        return $user;
    }


}

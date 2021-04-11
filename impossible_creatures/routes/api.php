<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\AnimalController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return view('home');
});

# Route pour les utilisateurs
Route::post('/register', [UserController::class, 'register']);
Route::post('/auth', [UserController::class, 'Auth']);

# CRUD des espèces
Route::get('/species', [SpeciesController::class, 'getAll']);
Route::post('/species', [SpeciesController::class, 'create']);
Route::put('/species/{id}', [SpeciesController::class, 'update']);
Route::delete('/species/{id}', [SpeciesController::class, 'delete']);

# CRUD des animaux
Route::get('/animal', [AnimalController::class, 'show']);
Route::post('/animal', [AnimalController::class, 'create']);
Route::put('/animal/{id}', [AnimalController::class, 'modify']);
Route::delete('/animal/{id}', [AnimalController::class, 'delete']);

# GET supplémentaire
Route::get('/animal/user/{id}', [AnimalController::class, 'search']);
Route::get('/species/user/{id}', [SpeciesController::class, 'getbyId']);
Route::get('/user/animal/{id}', [AnimalController::class, 'searchAnimal']);
Route::get('/point/{x}', [UserController::class, 'getuserbyPoint']);
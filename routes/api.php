<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bankController;
use App\Http\Controllers\blogsController;
use App\Http\Controllers\favController;
use App\Http\Controllers\recipesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('banks', bankController::class);

Route::resource('blogs', blogsController::class);

Route::resource('recipes', recipesController::class);

Route::resource('fav', favController::class);

Route::put('add-fav/{id}', [recipesController::class, 'addToFavorite']);

Route::delete('remove-fav/{id}', [recipesController::class, 'removeFav']);

Route::get('all-fav', [recipesController::class, 'getAllFav']);
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



/*=============== USER ===============*/
Route::group(['middleware' => 'auth:sanctum'], function () {
    //All secure URL's

});

Route::middleware('cors')->group(function () {
    Route::post("categories", "App\Http\Controllers\CategoryController@store");
    Route::get("users", "App\Http\Controllers\UserController@index");
    Route::get("users/{id}", "App\Http\Controllers\UserController@show");
    Route::post("users", "App\Http\Controllers\UserController@store");
    Route::put("users/{id}", "App\Http\Controllers\UserController@update");
    Route::delete("users/{id}", "App\Http\Controllers\UserController@destroy");

    /*=============== RECIPE ===============*/

    Route::get("recipes", "App\Http\Controllers\RecipeController@index");
    Route::get("recipes/{id}", "App\Http\Controllers\RecipeController@show");
    Route::post("recipes", "App\Http\Controllers\RecipeController@store");
    Route::put("recipes/{id}", "App\Http\Controllers\RecipeController@update");
    Route::delete("recipes/{id}", "App\Http\Controllers\RecipeController@destroy");

    /*=============== INSTRUCTION ===============*/
    Route::get("instructions/{recipe_id}", "App\Http\Controllers\InstructionController@index");
    Route::post("recipes/{id}/instructions", "App\Http\Controllers\InstructionController@store");
    Route::put("recipes/{recipe_id}/instructions/{id}", "App\Http\Controllers\InstructionController@update");
    Route::delete("instructions/{id}", "App\Http\Controllers\InstructionController@destroy");

    /*=============== INGREDIENT ===============*/

    Route::get("ingredients/{recipe_id}", "App\Http\Controllers\IngredientController@index");
    Route::post("recipes/{id}/ingredients", "App\Http\Controllers\IngredientController@store");
    Route::put("recipes/{recipe_id}/ingredients/{id}", "App\Http\Controllers\IngredientController@update");
    Route::delete("ingredients/{id}", "App\Http\Controllers\IngredientController@destroy");

    /*=============== CATEGORY ===============*/
    Route::get("categories", "App\Http\Controllers\CategoryController@index");
    Route::get("categories/{id}", "App\Http\Controllers\CategoryController@show");
    Route::put("categories/{id}", "App\Http\Controllers\CategoryController@update");
    Route::delete("categories/{id}", "App\Http\Controllers\CategoryController@destroy");





    Route::post("login", "App\Http\Controllers\UserController@login");

    Route::post("upload-image", "App\Http\Controllers\RecipeController@uploadImage");



});


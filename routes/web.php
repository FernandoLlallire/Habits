<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*Aca las rutas las definimos con el alias que le ponemos con el metodo name*/
Route::get("/challenges","ChallengesController@index")->name("challenges.index");
Route::get("/challenges/create", "ChallengesController@create")->name("challenges.create");
Route::post("/challenges/store","ChallengesController@store")->name("challenges.store");
Route::get("/challenges/{id}/edit","ChallengesController@edit")->name("challenges.edit");
Route::get("/challenges/{id}","ChallengesController@show")->name("challenges.show");
Route::put("/challenges/{id}","ChallengesController@update")->name("challenges.update");
Route::delete("/challenges/{id}","ChallengesController@destroy")->name("challenges.delete");

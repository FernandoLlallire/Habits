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
Route::get("/createchallenge", "ChallengesController@create")->name("challenges.create");
Route::post("/createchallenge/store","ChallengesController@store")->name("challenges.save");

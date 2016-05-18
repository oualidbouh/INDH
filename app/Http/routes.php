<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('spems',function(){
	return view('pages.Addproject');
});


Route::get('AjouterProjet',function(){
	return view('pages.ajouterProjet');
});

Route::get('addArchi',function(){
	return view('pages.addArchi');
});


Route::get('marches',function(){
	return view('pages.projets');
});

Route::post('addArchi','ArchitecteController@store');

Route::post('addMaitreOuvrage','MaitreOuvrageController@store');
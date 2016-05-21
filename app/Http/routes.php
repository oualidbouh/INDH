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
/*
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

Route::get('getAllLaboratoires','LaboratoireController@getAllLaboratoires');


*/


Route::get('/', function () {
    return view('home');
});

Route::get("/{year}/marches","marchesCtrl@getMarkets");
Route::get("/labos","CollaboratorCtrl@getLabos");
Route::get("/bets","CollaboratorCtrl@getBets");
Route::get("/archs","CollaboratorCtrl@getArchs");
Route::get("/societes","CollaboratorCtrl@getSocietes");
Route::get("/maitres","CollaboratorCtrl@getMaitres");

Route::post("/labos","CollaboratorCtrl@postLabos");
Route::post("/bets","CollaboratorCtrl@postBets");
Route::post("/archs","CollaboratorCtrl@postArchs");
Route::post("/societes","CollaboratorCtrl@postSocietes");
Route::post("/maitres","CollaboratorCtrl@postMaitres");



?>
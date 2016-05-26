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
    return view('home');
});

/*GET REQUEST*/

Route::get("/{year}/marches","marchesCtrl@getMarkets");
Route::get("/labos","CollaboratorCtrl@getLabos");
Route::get("/bets","CollaboratorCtrl@getBets");
Route::get("/archs","CollaboratorCtrl@getArchs");
Route::get("/societes","CollaboratorCtrl@getSocietes");
Route::get("/maitres","CollaboratorCtrl@getMaitres");
Route::get('/bpMarkets',"marchesCtrl@getBpMarkets");
Route::get('/bgMarkets',"marchesCtrl@getBgMarkets");
Route::get('/indhMarkets',"marchesCtrl@getIndhMarkets");
Route::get('/test','marchesCtrl@postMarket');

/*POST REQUEST*/
Route::post("/labos","CollaboratorCtrl@postLabos");
Route::post("/bets","CollaboratorCtrl@postBets");
Route::post("/archs","CollaboratorCtrl@postArchs");
Route::post("/societes","CollaboratorCtrl@postSocietes");
Route::post("/maitres","CollaboratorCtrl@postMaitres");

Route::post('/marche','marchesCtrl@postMarket');

?>
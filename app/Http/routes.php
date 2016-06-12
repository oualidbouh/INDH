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

Route::get("/markets/{year}/{type}","marchesCtrl@getMarkets");

Route::get("/labos","CollaboratorCtrl@getLabos");

Route::get("/bets","CollaboratorCtrl@getBets");

Route::get("/archs","CollaboratorCtrl@getArchs");

Route::get("/societes","CollaboratorCtrl@getSocietes");

Route::get("/maitres","CollaboratorCtrl@getMaitres");

Route::get("market/{id}/decomptes","marchesCtrl@getDecomptes");

Route::get('/mail','marchesCtrl@sendMail');

/*POST REQUEST*/
Route::post("/labos","CollaboratorCtrl@postLabos");
Route::post("/bets","CollaboratorCtrl@postBets");
Route::post("/archs","CollaboratorCtrl@postArchs");
Route::post("/societes","CollaboratorCtrl@postSoc
	ietes");
Route::post("/maitres","CollaboratorCtrl@postMaitres");

Route::post('/marche','marchesCtrl@postMarket');

/*        Delete request */

Route::delete("/delete/{id}","marchesCtrl@deleteMarket");

?>
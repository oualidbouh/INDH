<?php

Route::get('/', function () {
    return view('home');
});

/*GET REQUEST*/

Route::get('/excel','ExcelController@getExcel');
Route::get("/markets/{year}/{type}","marchesCtrl@getMarkets");
Route::get("/labos","CollaboratorCtrl@getLabos");
Route::get("/bets","CollaboratorCtrl@getBets");
Route::get("/archs","CollaboratorCtrl@getArchs");
Route::get("/societes","CollaboratorCtrl@getSocietes");
Route::get("/maitres","CollaboratorCtrl@getMaitres");
Route::get('/bpMarkets',"marchesCtrl@getBpMarkets");
Route::get('/bgMarkets',"marchesCtrl@getBgMarkets");
Route::get('/indhMarkets',"marchesCtrl@getIndhMarkets");
Route::get("/market/{id}/decomptes","marchesCtrl@getDecomptes");
Route::get("/market/{id}/avenants","marchesCtrl@getAvenants");
Route::get("/collaborators/all","CollaboratorCtrl@getAll");
Route::get('/pdf/market/{id}',"marchesCtrl@downloadPdf");
Route::get("/market/images/{id}","marchesCtrl@getImages");
Route::get("/users","UserController@getUsers");

/*POST REQUEST*/
Route::post("/labos","CollaboratorCtrl@postLabos");
Route::post("/bets","CollaboratorCtrl@postBets");
Route::post("/architectes","CollaboratorCtrl@postArchs");
Route::post("/societes","CollaboratorCtrl@postSocietes");
Route::post("/maitreOuvrages","CollaboratorCtrl@postMaitres");
Route::post('/marche','marchesCtrl@postMarket');
Route::post('/market/newDecompte','marchesCtrl@addDecompte');
Route::post('/market/newAvenant','marchesCtrl@addAvenant');
Route::post('/mail','CollaboratorCtrl@sendMail');
Route::post('/login','marchesCtrl@login');
Route::post("/upload","marchesCtrl@postImage");
Route::post('collaborateur','CollaboratorCtrl@postNewCollaborator');
Route::post('/users','UserController@addUser');

/*PUT REQUEST*/
Route::put("/collaborators/update","CollaboratorCtrl@putCollaborator");
Route::put("/market/{id}","marchesCtrl@putMarket");
Route::put("/users","UserController@updateUser");

/*DELETE REQUEST*/
Route::delete("market/delete/{id}","marchesCtrl@deleteMarket");
Route::delete("/decompte/delete/{id}","marchesCtrl@deleteDecompte");
Route::delete("/avenant/delete/{id}","marchesCtrl@deleteAvenant");
Route::delete("/market/images/{iid}","marchesCtrl@deleteImage");

?>
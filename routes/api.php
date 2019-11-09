<?php

use Illuminate\Http\Request;

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::post('/registrar','Carrera4kController@registrar');
Route::get('/mostrar','Carrera4kController@mostrar');
Route::get('/planteles','Carrera4kController@planteles');

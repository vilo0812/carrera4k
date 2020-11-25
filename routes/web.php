<?php
Route::get('/descargaP', 'Carrera4kController@descargaP');
Route::get('/descargar', 'Carrera4kController@descargarTodo');
Route::get('/descargarMCA', 'Carrera4kController@descargarMCA');
Route::get('/descargarVM', 'Carrera4kController@descargarVM');
Route::get('/descargar4K', 'Carrera4kController@descargar4K');
Route::get('/{any}', 'Carrera4kController@index')->where('any', '.*');

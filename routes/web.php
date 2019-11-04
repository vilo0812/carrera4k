<?php
Route::get('/{any}', 'Carrera4kController@index')->where('any', '.*');

<?php
Route::get('/{any}', 'RegisterController@index')->where('any', '.*');

<?php

// Webapp
Route::get('{any?}', [
    'middleware' => ['web', 'auth', 'jwt'],
    'uses' => 'WebappController@index'
])->where('any', '.*');

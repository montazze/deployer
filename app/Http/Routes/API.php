<?php

// Dashboard
Route::group([
    'middleware' => ['web', 'auth', 'jwt'],
], function () {
    Route::get('api/projects/{id}', [
        'as'   => 'projects',
        'uses' => 'DeploymentController@project',
    ]);
});

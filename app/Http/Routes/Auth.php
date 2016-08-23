<?php

// Authentication routes
Route::group([
    'middleware' => ['web', 'guest'],
    'namespace'  => 'Auth',
], function () {
    Route::get('login', [
        'middleware' => 'guest',
        'as'         => 'auth.login',
        'uses'       => 'LoginController@getLogin',
    ]);

    Route::post('login', [
        'middleware' => ['guest', 'throttle:10,10'],
        'as'         => 'auth.login-verify',
        'uses'       => 'LoginController@postLogin',
    ]);

    Route::get('login/2fa', [
        'as'   => 'auth.twofactor',
        'uses' => 'AuthController@getTwoFactorAuthentication',
    ]);

    Route::post('login/2fa', [
        'middleware' => 'throttle:10,10',
        'as'         => 'auth.twofactor-verify',
        'uses'       => 'AuthController@postTwoFactorAuthentication',
    ]);

    Route::get('password/reset', [
        'as'   => 'auth.reset-password-request',
        'uses' => 'ForgotPasswordController@showLinkRequestForm',
    ]);

    Route::get('password/reset/{token}', [
        'as'   => 'auth.reset-password-confirm',
        'uses' => 'ForgotPasswordController@showResetForm',
    ]);

    Route::post('password/email', [
        'as'   => 'auth.password-reset-link',
        'uses' => 'ForgotPasswordController@sendResetLinkEmail',
    ]);

    Route::post('password/reset', [
        'as'   => 'auth.reset-password',
        'uses' => 'ForgotPasswordController@reset',
    ]);
});

Route::get('logout', [ // FIXME: Convert to post
    'middleware' => ['web', 'auth'],
    'as'         => 'auth.logout',
    'uses'       => 'Auth\LoginController@logout',
]);

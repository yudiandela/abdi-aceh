<?php

Route::name('api.')->group(function () {
    Route::post('register', 'Api\Auth\RegisterController')->name('register');
    Route::post('login', 'Api\Auth\LoginController')->name('login');

    Route::middleware('auth:api')->group(function () {
        Route::post('logout', 'Api\Auth\LogoutController')->name('logout');
    });
});

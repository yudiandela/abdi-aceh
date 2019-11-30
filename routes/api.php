<?php

Route::name('api.')->group(function () {
    Route::post('register', 'Api\RegisterController')->name('register');
    Route::post('login', 'Api\LoginController')->name('login');

    Route::middleware('auth:api')->group(function () {
        Route::post('logout', 'Api\LogoutController')->name('logout');
    });
});

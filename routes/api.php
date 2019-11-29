<?php

Route::name('api.')->group(function () {
    Route::post('register', 'Api\RegisterController')->name('register');
});

<?php

use Illuminate\Support\Facades\Route;

Route::prefix('panel')
    ->group(function () {
        Route::post('register', Panel\User\CreateAccout\Controller::class);
        Route::post('login', Panel\User\Login\Controller::class);
    });

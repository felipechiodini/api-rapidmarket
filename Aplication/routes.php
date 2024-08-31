<?php

use Illuminate\Support\Facades\Route;

Route::middleware('api')
    ->group(function () {
        Route::get('home', Aplication\Home\Controller::class);

        Route::prefix('cart')
            ->group(function () {
                Route::get('show', Aplication\Cart\Show\Controller::class);
                Route::post('increase-item', Aplication\Cart\Increase\Controller::class);
                Route::post('decrease-item', Aplication\Cart\Decrease\Controller::class);
                Route::post('finish', Aplication\Cart\Finish\Controller::class);
            });
    });

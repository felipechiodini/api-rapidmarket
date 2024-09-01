<?php

use Illuminate\Support\Facades\Route;

Route::prefix('app')
    ->group(function () {
        Route::get('home', Application\Home\Controller::class);
        Route::get('product', Application\Product\Show\Controller::class);

        Route::prefix('customer')
            ->group(function () {
                Route::post('login', Application\Customer\Login\Controller::class);
                Route::post('create-account', Application\Customer\CreateAccount\Controller::class);
                Route::post('address', Application\Address\Store\Controller::class);
            });

        Route::prefix('cart')
            ->group(function () {
                Route::get('show', Application\Cart\Show\Controller::class);
                Route::post('add', Application\Cart\Add\Controller::class);
                Route::post('increase-item', Application\Cart\Increase\Controller::class);
                Route::post('decrease-item', Application\Cart\Decrease\Controller::class);
                Route::post('finish', Application\Cart\Finish\Controller::class);
            });
    });

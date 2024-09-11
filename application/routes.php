<?php

use Illuminate\Support\Facades\Route;


Route::prefix('app')
    ->group(function () {
        Route::post('login', Application\Customer\Login\Controller::class);

        Route::middleware('api')
            ->group(function () {
                Route::get('home', Application\Home\Controller::class);
                Route::get('product', Application\Product\Show\Controller::class);
                Route::post('customer/create-account', Application\Customer\CreateAccount\Controller::class);
                Route::post('customer/address', Application\Address\Store\Controller::class);
                Route::get('cart/show', Application\Cart\Show\Controller::class);
                Route::post('cart/add', Application\Cart\Add\Controller::class);
                Route::post('cart/increase-item', Application\Cart\Increase\Controller::class);
                Route::post('cart/decrease-item', Application\Cart\Decrease\Controller::class);
                Route::post('cart/finish', Application\Cart\Finish\Controller::class);
                Route::get('orders', Application\Order\List\Controller::class);
            });
    });

<?php

namespace Application;

use Application\Customer\UseCases\GetCart;
use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class ServiceProvider extends SupportServiceProvider
{
    public $bindings = [
        GetCart::class => GetCart::class
    ];

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }
}

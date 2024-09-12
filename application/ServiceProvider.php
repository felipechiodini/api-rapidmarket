<?php

namespace Application;

use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class ServiceProvider extends SupportServiceProvider
{
    public $bindings = [
        \Application\Customer\UseCases\GetCart::class => \Application\Customer\UseCases\GetCart::class
    ];

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }
}

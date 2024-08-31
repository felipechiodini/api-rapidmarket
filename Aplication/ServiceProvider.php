<?php

namespace Aplication;

use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class ServiceProvider extends SupportServiceProvider
{
    public $bindings = [

    ];

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }
}

<?php

namespace Tenancy\Providers;

use Illuminate\Support\ServiceProvider;
use Tenancy\Environment;

class TenancyProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Environment::class);
    }

    public function provides()
    {
        return [
            Environment::class
        ];
    }
}

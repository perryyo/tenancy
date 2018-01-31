<?php

namespace Tenancy\Providers;

use Illuminate\Support\ServiceProvider;
use Tenancy\Identification\Delegation;

class TenancyProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerIdentificationDelegation();
    }

    protected function registerIdentificationDelegation()
    {
        $this->app->singleton(Delegation::class);
    }
}

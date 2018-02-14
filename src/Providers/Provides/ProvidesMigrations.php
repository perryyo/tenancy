<?php

namespace Tenancy\Providers\Provides;

trait ProvidesMigrations
{
    protected $paths = [

    ];

    protected function bootProvidesMigrations()
    {
        $this->loadMigrationsFrom($this->paths);
    }
}

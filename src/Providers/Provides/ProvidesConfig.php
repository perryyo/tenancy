<?php

namespace Tenancy\Providers\Provides;

trait ProvidesConfig
{
    protected $configs = [
        __DIR__.'/../../../resources/config/tenancy.php' => 'tenancy'
    ];

    protected function bootProvidesConfig()
    {
        foreach ($this->configs as $path => $key) {
            $this->mergeConfigFrom(
                $path,
                $key
            );
        }
    }
}

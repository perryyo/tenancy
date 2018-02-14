<?php

namespace Tenancy\Providers\Provides;

trait ProvidesServices
{
    protected $providesServices = [];

    public function provides()
    {
        $provides = $this->singletons;

        $provides = array_merge(
            $provides,
            $this->providesServices
        );

        return $provides;
    }
}

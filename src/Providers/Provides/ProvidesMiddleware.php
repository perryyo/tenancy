<?php

namespace Tenancy\Providers\Provides;

use Illuminate\Contracts\Http\Kernel;
use Tenancy\Identification\Middleware\EagerIdentification;

trait ProvidesMiddleware
{
    protected $middlewares = [
        // Configuration key, middleware mapping.
        'tenancy.identification.eager' => EagerIdentification::class,
    ];

    protected function bootProvidesMiddleware()
    {
        /** @var Kernel $kernel */
        $kernel = $this->app->make(Kernel::class);

        foreach ($this->middlewares as $key => $middleware) {
            if (is_int($key) ||  (is_string($key) && config($key))) {
                $kernel->prependMiddleware($middleware);
            }
        }
    }
}

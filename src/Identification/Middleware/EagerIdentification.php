<?php

namespace Tenancy\Identification\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Tenancy\Environment;

class EagerIdentification
{
    /**
     * @var Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var Environment $env */
        $env = $this->app->make(Environment::class);

        if (! $env->isIdentified()) {
            $env->getTenant();
        }

        return $next($request);
    }
}

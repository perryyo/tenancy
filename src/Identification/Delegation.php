<?php

namespace Tenancy\Identification;

use Illuminate\Contracts\Foundation\Application;
use Tenancy\Contracts\IdentifiesTenant;
use Tenancy\Contracts\Tenant;

class Delegation
{

    /**
     * @var Application
     */
    private $app;

    /**
     * The registered services to help identify tenants.
     *
     * @var array|string[]
     */
    protected static $services = [];

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public static function registerIdentificationService(string $service)
    {
        static::$services[] = $service;
    }

    public static function getIdentificationServices(): array
    {
        return static::$services;
    }

    public function identify(): ?Tenant
    {
        $tenant = null;

        collect(static::$services)
            ->mapWithKeys(function (string $service) {
                return [
                    $service => $this->app->make($service)
                ];
            })
            ->sortBy(function (IdentifiesTenant $service) {
                return $service->priority();
            })
            ->filter(function (IdentifiesTenant $service) {
                return $service->canIdentify();
            })
            ->first(function (IdentifiesTenant $service) use (&$tenant) {
                return $tenant = $service->tenant();
            });

        return $tenant;
    }
}

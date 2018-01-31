<?php

namespace Tenancy\Identification;

use Tenancy\Contracts\IdentifiesTenant;
use Tenancy\Contracts\Tenant;

class Delegation
{
    /**
     * The registered services to help identify tenants.
     *
     * @var array
     */
    protected static $services = [];

    public static function registerIdentificationService(IdentifiesTenant $service)
    {
        static::$services[] = $service;
    }

    public function identify(): ?Tenant
    {
        $tenant = null;

        collect(static::$services)
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

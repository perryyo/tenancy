<?php

namespace Tenancy\Contracts;

interface IdentifiesTenant
{
    /**
     * Identifies the currently active tenant.
     * @return null|Tenant
     */
    public function tenant(): ?Tenant;

    /**
     * Whether this service is able to identify a tenant.
     * @return bool
     */
    public function canIdentify(): bool;

    public function priority(): int;
}

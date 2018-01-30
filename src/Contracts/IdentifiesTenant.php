<?php

namespace Tenancy\Contracts;

interface IdentifiesTenant
{
    /**
     * Identifies the currently active tenant.
     * @return null|Tenant
     */
    public function tenant(): ?Tenant;
}

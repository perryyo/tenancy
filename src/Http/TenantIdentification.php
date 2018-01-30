<?php

namespace Tenancy\Http;

use Illuminate\Http\Request;
use Tenancy\Contracts\IdentifiesTenant;
use Tenancy\Contracts\Tenant;

class TenantIdentification implements IdentifiesTenant
{
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Identifies the currently active tenant.
     * @return null|Tenant
     */
    public function tenant(): ?Tenant
    {
        // TODO: Implement tenant() method.
    }
}

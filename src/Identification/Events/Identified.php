<?php

namespace Tenancy\Identification\Events;

use Tenancy\Contracts\IdentifiableAsTenant;

class Identified
{
    /**
     * @var IdentifiableAsTenant
     */
    public $tenant;

    public function __construct(IdentifiableAsTenant $tenant)
    {
        $this->tenant = $tenant;
    }
}

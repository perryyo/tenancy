<?php

namespace Tenancy\Database\Events;

use Tenancy\Contracts\IdentifiableAsTenant;

class Resolving
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

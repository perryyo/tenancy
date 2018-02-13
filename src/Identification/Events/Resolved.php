<?php

namespace Tenancy\Identification\Events;

use Tenancy\Contracts\IdentifiableAsTenant;

class Resolved
{
    /**
     * @var IdentifiableAsTenant|null
     */
    public $tenant;

    public function __construct(IdentifiableAsTenant &$tenant = null)
    {
        $this->tenant = &$tenant;
    }
}

<?php

namespace Tenancy\Database\Events;

use Illuminate\Database\ConnectionInterface;
use Tenancy\Contracts\IdentifiableAsTenant;

class Identified
{
    /**
     * @var IdentifiableAsTenant
     */
    public $tenant;
    /**
     * @var ConnectionInterface
     */
    public $connection;

    public function __construct(IdentifiableAsTenant $tenant, ConnectionInterface &$connection)
    {
        $this->tenant = $tenant;
        $this->connection = &$connection;
    }
}

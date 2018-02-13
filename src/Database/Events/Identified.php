<?php

/*
 * This file is part of the tenancy/tenancy package.
 *
 * (c) Daniël Klabbers <daniel@klabbers.email>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://laravel-tenancy.com
 * @see https://github.com/tenancy
 */

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

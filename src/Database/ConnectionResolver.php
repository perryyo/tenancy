<?php

namespace Tenancy\Database;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\ConnectionInterface;
use Tenancy\Contracts\IdentifiableAsTenant;

class ConnectionResolver
{
    /**
     * @var Dispatcher
     */
    protected $events;

    public function __construct(Dispatcher $events)
    {
        $this->events = $events;
    }

    public function __invoke(IdentifiableAsTenant $tenant): ?ConnectionInterface
    {
        $connection = $this->events->until(new Events\Resolving($tenant));

        if ($connection) {
            $this->events->dispatch(new Events\Identified($tenant, $connection));
        }

        $this->events->dispatch(new Events\Resolved($tenant, $connection));

        return $connection;
    }
}

<?php

namespace Tenancy\Identification;

use Illuminate\Contracts\Events\Dispatcher;
use Tenancy\Contracts\IdentifiableAsTenant;

class Resolver
{
    /**
     * @var Dispatcher
     */
    protected $events;

    public function __construct(Dispatcher $events)
    {
        $this->events = $events;
    }

    public function __invoke(): ?IdentifiableAsTenant
    {
        $tenant = $this->events->until(new Events\Resolving);

        if ($tenant) {
            $this->events->dispatch(new Events\Identified($tenant));
        }

        $this->events->dispatch(new Events\Resolved($tenant));

        return $tenant;
    }
}

<?php

namespace Tenancy\Database\Contracts;

use Tenancy\Identification\Contracts\IdentifiableAsTenant;

interface ResolvesConnections
{
    public function __invoke(IdentifiableAsTenant $tenant): ?ProvidesDatabaseDriver;
}

<?php

namespace Tenancy\Contracts;

interface ResolvesTenants
{
    public function __invoke(): ?IdentifiableAsTenant;
}

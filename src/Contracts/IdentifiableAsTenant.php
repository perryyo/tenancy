<?php

namespace Tenancy\Contracts;

interface IdentifiableAsTenant
{
    public function getTenantKeyName(): string;

    public function getTenantKey();

    public function getTenantIdentifierName(): string;

    public function getTenantIdentifier();
}

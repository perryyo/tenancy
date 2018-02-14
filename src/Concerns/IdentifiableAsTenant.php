<?php

namespace Tenancy\Concerns;

trait IdentifiableAsTenant
{
    /**
     * The attribute of the Model to use for the key.
     *
     * @return string
     */
    public function getTenantKeyName(): string
    {
        return $this->getKeyName();
    }

    /**
     * The actual value of the key for the tenant Model.
     *
     * @return mixed
     */
    public function getTenantKey()
    {
        return $this->getKey();
    }

    /**
     * The value type of the key.
     *
     * @return string
     */
    public function getTenantKeyType(): string
    {
        return $this->getKeyType();
    }

    /**
     * A unique identifier, eg class or table to distinguish this tenant Model.
     *
     * @return string
     */
    public function getTenantIdentifier(): string
    {
        return $this->getConnectionName().'.'.$this->getTable();
    }
}

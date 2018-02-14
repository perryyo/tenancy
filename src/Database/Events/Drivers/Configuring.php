<?php

namespace Tenancy\Database\Events\Drivers;

class Configuring
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var array
     */
    public $configuration;

    public function __construct(string $name, array $configuration)
    {
        $this->name = $name;
        $this->configuration = $configuration;
    }
}

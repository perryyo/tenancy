<?php

namespace Tenancy\Facades;

use Illuminate\Support\Facades\Facade;
use Tenancy\Environment;

class TenancyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Environment::class;
    }
}

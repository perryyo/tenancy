<?php

namespace Tenancy;

use Illuminate\Contracts\Foundation\Application;
use Tenancy\Contracts\IdentifiableAsTenant;

class Environment
{
    /**
     * @var IdentifiableAsTenant
     */
    protected $tenant;

    protected $identified = false;

    /**
     * @var Application
     */
    private $app;

    protected static $identificationResolver;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function setTenant(IdentifiableAsTenant $tenant = null)
    {
        $this->tenant = $tenant;

        return $this;
    }

    public function getTenant(bool $refresh = false): ?IdentifiableAsTenant
    {
        if (! $refresh || ! $this->identified) {
            $this->setTenant(
                $this->app->call(static::getIdentificationResolver())
            );

            $this->identified = true;
        }

        return $this->tenant;
    }

    public static function getIdentificationResolver()
    {
        if (! static::$identificationResolver) {
            static::$identificationResolver = resolve(Identification\Resolver::class);
        }

        return static::$identificationResolver;
    }

    public static function setIdentificationResolver($resolver)
    {
        static::$identificationResolver = $resolver;
    }
}

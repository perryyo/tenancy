<?php

namespace Tenancy\Tests\Unit\Concerns;

use Illuminate\Database\Eloquent\Model;
use ReflectionClass;
use Tenancy\Concerns\IdentifiableAsTenant as Concern;
use Tenancy\Contracts\IdentifiableAsTenant as Contract;
use Tenancy\Tests\TestCase;

class IdentifiableAsTenantTest extends TestCase
{
    protected $class;

    protected function afterSetUp()
    {
        $this->class = new class() extends Model {
            use Concern;
        };
    }

    /**
     * @test
     */
    public function has_required_methods()
    {
        $has = collect((new ReflectionClass($this->class))->getMethods())->pluck('name');
        $needs = collect((new ReflectionClass(Contract::class))->getMethods())->pluck('name');

        $this->assertCount(
            $needs->count(),
            $has->intersect($needs),
            Concern::class.' does not implement all required interface methods from '.Contract::class
        );
    }
}

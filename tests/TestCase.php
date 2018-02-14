<?php

namespace Tenancy\Tests;

use Illuminate\Foundation\Testing\TestCase as Test;

class TestCase extends Test
{
    use Concerns\CreatesApplication;

    protected function afterSetUp()
    {
        // ..
    }

    protected function beforeTearDown()
    {
        // ..
    }

    protected function setUp()
    {
        parent::setUp();

        $this->afterSetUp();
    }

    protected function tearDown()
    {
        $this->beforeTearDown();

        parent::tearDown();
    }
}

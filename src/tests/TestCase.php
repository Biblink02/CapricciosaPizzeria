<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function createApplication()
    {
        $app = parent::createApplication();

        if (! $app->environment('testing') || $app['config']->get('database.connections.mariadb.database') !== 'capricciosa_tests') {
            throw new \RuntimeException('Tests require the isolated capricciosa_tests database and testing environment.');
        }

        return $app;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }
}

<?php

namespace Tests;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase {
    use RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();

        // Seed roles table for every test
        $this->seed(DatabaseSeeder::class);
    }
}

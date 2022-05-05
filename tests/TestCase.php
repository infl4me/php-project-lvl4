<?php

namespace Tests;

use App\Models\User;
use Database\Seeders\TaskStatusSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    use DatabaseTransactions;
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(TaskStatusSeeder::class);
        $user = User::factory()->create();
        $this->user = $user;
        $this->actingAs($user);
    }
}

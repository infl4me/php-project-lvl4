<?php

namespace Tests\Feature;

use App\Models\TaskStatus;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\CreatesApplication;
use Tests\TestCase;

class TaskStatusTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;

    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
        TaskStatus::factory()->count(2)->create();
    }

    public function testIndex()
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testStore()
    {
        $data = TaskStatus::factory()->make()->only('name');
        $response = $this->post(route('task_statuses.store'), ['name' => $data['name']]);
        $taskStatus = TaskStatus::latest('id')->first();
        $response->assertRedirect(route('task_statuses.show', $taskStatus));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testCreate()
    {
        $response = $this->get(route('task_statuses.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $taskStatus = TaskStatus::first();
        $response = $this->get(route('task_statuses.edit', $taskStatus));
        $response->assertOk();
    }

    public function testUpdate()
    {
        $taskStatus = TaskStatus::first();
        $data = TaskStatus::factory()->make()->only('name');

        $response = $this->patch(route('task_statuses.update', $taskStatus), ['name' => $data['name']]);

        $response->assertRedirect(route('task_statuses.show', $taskStatus));
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testDestroy()
    {
        $taskStatus = TaskStatus::first();

        $response = $this->delete(route('task_statuses.destroy', $taskStatus));

        $response->assertRedirect(route('task_statuses.index'));
        $response->assertSessionHasNoErrors();
    }
}

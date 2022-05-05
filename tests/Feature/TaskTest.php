<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Database\Seeders\TaskStatusSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\CreatesApplication;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;

    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(TaskStatusSeeder::class);
        User::factory()->hasTasks(2)->create();
    }

    public function testIndex()
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testStore()
    {
        $data = Task::factory()->make()->toArray();
        $response = $this->post(route('tasks.store'), $data);
        $task = Task::latest('id')->first();
        $response->assertRedirect(route('tasks.show', $task));
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('tasks', $data);
    }

    public function testCreate()
    {
        $response = $this->get(route('tasks.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $task = Task::first();
        $response = $this->get(route('tasks.edit', $task));
        $response->assertOk();
    }

    public function testUpdate()
    {
        $task = Task::first();
        $data = Task::factory()->make()->only('name', 'description');

        $response = $this->patch(route('tasks.update', $task), $data);

        $response->assertRedirect(route('tasks.edit', $task));
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('tasks', $data);
    }

    public function testDestroy()
    {
        $taskStatus = Task::first();

        $response = $this->delete(route('tasks.destroy', $taskStatus));

        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHasNoErrors();
    }
}

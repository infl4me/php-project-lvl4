<?php

namespace Tests\Feature;

use App\Models\TaskStatus;
use App\Models\User;
use Tests\TestCase;

class TaskStatusTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testStore()
    {
        $data = TaskStatus::factory()->make()->only('name');
        $response = $this->post(route('task_statuses.store'), $data);
        $taskStatus = TaskStatus::latest('id')->first();
        $response->assertRedirect(route('task_statuses.index'));
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
        $user = User::first();
        $taskStatus = TaskStatus::first();
        $data = TaskStatus::factory()->make()->only('name');

        $response = $this->actingAs($user)->patch(route('task_statuses.update', $taskStatus), ['name' => $data['name']]);

        $response->assertRedirect(route('task_statuses.index'));
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testDestroy()
    {
        $user = User::first();
        $taskStatus = TaskStatus::first();

        $response = $this->actingAs($user)->delete(route('task_statuses.destroy', $taskStatus));

        $response->assertRedirect(route('task_statuses.index'));
        $response->assertSessionHasNoErrors();
    }
}

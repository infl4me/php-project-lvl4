<?php

namespace Database\Factories;

use App\Models\TaskStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
            'description' => $this->faker->text(200),
            'status_id' => TaskStatus::factory(),
        ];
    }
}

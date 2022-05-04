<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class TaskStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['new', 'in_progress', 'testing', 'complete']),
        ];
    }
}

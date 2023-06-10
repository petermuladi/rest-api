<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'user_id'=>\App\Models\User::all()->random()->id,
            'name' => fake()->unique()->sentence(),
            'description'=>fake()->text(),
            'priority'=>fake()->randomElement(['medium','high','low'])
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BugReport>
 */
class BugReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->sentence(),
            'environment'=> join(' ',[fake()->chrome(),fake()->linuxProcessor()]),
            'users'=>join(' ',[fake()->firstName(),fake()->lastName()]),
            'test_id'=>Test::factory()
        ];
    }
}

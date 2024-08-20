<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => fake()->jobTitle(),
            'salary' => fake()->randomElement(['$50,000 USD', '$70,000 USD', '$90,000 USD']),
            'location' => $this->faker->city,
            'workplace' => $this->faker->randomElement(['Remote', 'Office Based', 'Hybrid']),
            'schedule' => $this->faker->randomElement(['Full Time', 'Part Time']),
            'description' => $this->faker->paragraph,
            'url' => fake()->url,
            'featured' => $this->faker->boolean,


        ];
    }
}

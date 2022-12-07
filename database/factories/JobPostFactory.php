<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'company_id' => 1,
            'slug' => $this->faker->slug(),
            'title' => $this->faker->jobTitle(),
            'location' => $this->faker->city(),
            'description' => $this->faker->paragraph(10),
            'status' => 1,
        ];
    }
}

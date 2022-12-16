<?php

namespace Database\Factories\Forum;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Forum\Forum>
 */
class ForumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => 'dd04133a-7d52-4ceb-92e2-00518873f792',
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(10),
            'updated_at' => now()->subDays($this->faker->numberBetween(1,30)),
            'created_at' => now()->subDays($this->faker->numberBetween(1,30))
        ];
    }
}

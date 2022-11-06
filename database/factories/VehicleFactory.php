<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid(),
            'company_uuid' => 'dd04133a-7d52-4ceb-92e2-00518873f792',
            'slug' => $this->faker->slug(),
            'name' => 'Vehicle ' . $this->faker->firstName(),
            'title' => 'Vehicle ' . $this->faker->firstName(),
            'meta' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(15000, 50000),
            'price_weekend' => $this->faker->numberBetween(15000, 50000),
            'capacity' => $this->faker->numberBetween(10, 40),
            'images' => ['/files/omnia.jpeg'],
            'type' => 'bus',
            'description' => $this->faker->paragraph(5),
        ];
    }
}

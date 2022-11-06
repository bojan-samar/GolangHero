<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Company::class;

    public function definition()
    {
        return [
            'uuid' => "dd04133a-7d52-4ceb-92e2-00518873f792",
            'user_id' => 1,
            'name' => $this->faker->company(),
            'slug' => $this->faker->slug(),
            'url' => $this->faker->url(),
            'location' => $this->faker->city(),
            'phone' => $this->faker->phoneNumber(),
            'description' => $this->faker->paragraph(10),
        ];
    }
}

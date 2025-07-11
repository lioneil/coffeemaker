<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machine>
 */
class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Machine #'.$this->faker->numerify('####'),
            'water_level_ml' => $this->faker->randomFloat(2, 0, 2000),
            'coffee_level_grams' => $this->faker->randomFloat(2, 0, 500),
            'water_capacity_ml' => 2000,
            'coffee_capacity_grams' => 500,
        ];
    }

    public function prestine(): Factory
    {
        return $this->state(fn (array $attributes) => ([
            'water_level_ml' => 2000,
            'coffee_level_grams' => 500,
            'water_capacity_ml' => 2000,
            'coffee_capacity_grams' => 500,
        ]));
    }
}

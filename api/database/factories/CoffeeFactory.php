<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coffee>
 */
class CoffeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(2),
            'water_ml' => $this->faker->randomFloat(2, 30, 2000),
            'coffee_grams' => $this->faker->randomFloat(2, 50, 500),
            'image' => $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(2, 0, 100),
        ];
    }

    public function espresso(): Factory
    {
        return $this->state(fn (array $attributes) => ([
            'name' => 'Espresso',
            'water_ml' => 30.0,
            'coffee_grams' => 10,
            'image' => url('/images/espresso.png'),
            'price' => 2.50,
        ]));
    }

    public function double(): Factory
    {
        return $this->state(fn (array $attributes) => ([
            'name' => 'Double Espresso',
            'water_ml' => 60.0,
            'coffee_grams' => 20,
            'image' => url('/images/double-espresso.png'),
            'price' => 5.00,
        ]));
    }

    public function americano(): Factory
    {
        return $this->state(fn (array $attributes) => ([
            'name' => 'Americano',
            'water_ml' => 120.0,
            'coffee_grams' => 20,
            'image' => url('/images/americano.png'),
            'price' => 3.62,
        ]));
    }
}

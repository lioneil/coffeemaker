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
            'name' => ucwords($this->faker->words(2, true)),
            'description' => $this->faker->paragraph(2),
            'water_ml' => $this->faker->randomFloat(2, 16, 200),
            'coffee_grams' => $this->faker->randomFloat(2, 8, 20),
            'image' => url('/images/coffee-generic.png'),
            'price' => $this->faker->randomFloat(2, 1, 10),
        ];
    }

    public function espresso(): Factory
    {
        return $this->state(fn (array $attributes) => ([
            'name' => 'Espresso',
            'water_ml' => 24.0,
            'coffee_grams' => 8,
            'image' => url('/images/espresso.png'),
            'price' => 2.50,
        ]));
    }

    public function double(): Factory
    {
        return $this->state(fn (array $attributes) => ([
            'name' => 'Double Espresso',
            'water_ml' => 48.0,
            'coffee_grams' => 16,
            'image' => url('/images/double-espresso.png'),
            'price' => 5.00,
        ]));
    }

    public function ristretto(): Factory
    {
        return $this->state(fn (array $attributes) => ([
            'name' => 'Ristretto',
            'water_ml' => 16.0,
            'coffee_grams' => 8,
            'image' => url('/images/ristretto.png'),
            'price' => 3.25,
        ]));
    }

    public function americano(): Factory
    {
        return $this->state(fn (array $attributes) => ([
            'name' => 'Americano',
            'water_ml' => 148.0,
            'coffee_grams' => 16,
            'image' => url('/images/americano.png'),
            'price' => 5.25,
        ]));
    }
}

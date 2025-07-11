<?php

use App\Models\Coffee;
use Database\Seeders\CoffeeSeeder;

beforeEach(function () {
    $this->artisan('migrate:fresh'); // This creates the tables
    $this->seed(CoffeeSeeder::class);
});

it('can retrieve the list of coffees', function () {
    $response = $this->getJson('/api/v1/coffees');

    $response->assertStatus(200)
        ->assertJsonCount(3)
        ->assertJsonStructure([
            '*' => [
                'name',
                'water_ml',
                'coffee_grams',
                'image',
                'price',
            ],
        ]);
});

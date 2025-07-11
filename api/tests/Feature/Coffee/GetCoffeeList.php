<?php

use App\Models\Coffee;
use Database\Seeders\CoffeeSeeder;
use Database\Seeders\MachineSeeder;

beforeEach(function () {
    $this->artisan('migrate:fresh'); // This creates the tables
    $this->seed(MachineSeeder::class);
    $this->seed(CoffeeSeeder::class);
});

it('can retrieve the list of coffees', function () {
    $response = $this->getJson(route('coffees.index'));

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

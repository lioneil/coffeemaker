<?php

use Database\Seeders\CoffeeSeeder;
use Database\Seeders\MachineSeeder;

beforeEach(function () {
    $this->artisan('migrate:fresh'); // This creates the tables
    $this->seed(MachineSeeder::class);
    $this->seed(CoffeeSeeder::class);
});

it('can retrieve the status of the coffee machine', function () {
    $response = $this->getJson(route('machine.healthcheck'));
    $response->assertStatus(200)
        ->assertJsonStructure([
            'name',
            'water_level_ml',
            'water_capacity_ml',
            'coffee_level_grams',
            'coffee_capacity_grams',
        ]);
});

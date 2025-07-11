<?php

use App\Models\Coffee;
use App\Models\Machine;
use Database\Seeders\CoffeeSeeder;
use Database\Seeders\MachineSeeder;

beforeEach(function () {
    $this->artisan('migrate:fresh'); // This creates the tables
    $this->seed(MachineSeeder::class);
    $this->seed(CoffeeSeeder::class);
});

it('brews a coffee', function () {
    $coffee = Coffee::factory()->create([
        'name' => 'Instant 3-in-1 Coffee',
        'water_ml' => 237, // in ml
        'coffee_grams' => 10, // in grams
    ]);

    $response = $this->post(route('coffees.brew', $coffee));

    // Simulate the first machine since that's
    // what's on the AppServiceProvider
    $machine = Machine::first();

    $response->assertStatus(200);

    expect($machine->water_level_ml)->toBe(1763.0);
    expect($machine->coffee_level_grams)->toBe(490.0);
});

<?php

use App\Models\Machine;
use Database\Seeders\CoffeeSeeder;
use Database\Seeders\MachineSeeder;

beforeEach(function () {
    $this->artisan('migrate:fresh'); // This creates the tables
    $this->seed(MachineSeeder::class);
    $this->seed(CoffeeSeeder::class);
});

it('can refill water', function () {
    // Arrangement
    $machine = Machine::first();
    $machine->water_level_ml = 1000.0;
    $machine->save();

    // Action
    $response = $this->post(route('machine.refill'), ['water' => 50.0]);
    $machine->refresh();

    // Assertion
    $response->assertStatus(200);
    expect($machine->water_level_ml)->toBe(1050.0);
});

it('can refill coffee', function () {
    // Arrangement
    $machine = Machine::first();
    $machine->coffee_level_grams = 100.0;
    $machine->save();

    // Action
    $response = $this->post(route('machine.refill'), ['coffee' => 50.0]);
    $machine->refresh();

    // Assertion
    $response->assertStatus(200);
    expect($machine->coffee_level_grams)->toBe(150.0);
});

it("won't refill if water or coffee is low", function () {
    // Arrangement
    $machine = Machine::first();
    $machine->water_level_ml = 1.0;
    $machine->coffee_level_grams = 1.0;
    $machine->save();

    // Action
    $response = $this->post(route('machine.refill'), ['coffee' => 50.0]);
    $machine->refresh();

    // Assertion
    $response->assertStatus(200);
});

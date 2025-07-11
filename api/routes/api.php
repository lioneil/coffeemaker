<?php

use App\Http\Controllers\Coffee\BrewCoffee;
use App\Http\Controllers\Coffee\GetCoffeeList;
use App\Http\Controllers\Machine\CheckMachineHealthStatus;
use App\Http\Controllers\Machine\RefillMachine;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('coffees', GetCoffeeList::class)->name('coffees.index');
    Route::post('coffees/{coffee}/brew', BrewCoffee::class)->name('coffees.brew');

    Route::prefix('machine')->group(function () {
        Route::post('refill', RefillMachine::class)->name('machine.refill');
        Route::get('healthcheck', CheckMachineHealthStatus::class)->name('machine.healthcheck');
    });
});

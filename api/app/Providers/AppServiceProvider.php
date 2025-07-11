<?php

namespace App\Providers;

use App\Containers\CoffeeContainer;
use App\Containers\WaterContainer;
use App\Models\Machine;
use App\Services\CoffeeMachineService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /**
         * For this challenge, we are assuming:
         *  1. There is always at least 1 machine in database (run artisan db:seed --class MachineSeeder).
         *  2. We are using the first machine for simplicity.
         *
         * Otherwise, we can use request()->get('machine') or request()->route('machine').
         */
        $this->app->bind(CoffeeMachineService::class, fn () => new CoffeeMachineService(
            $machine = Machine::firstOrFail(),

            new WaterContainer(
                name: config('coffee.containers.water.name'),
                capacity: $machine->water_capacity_ml,
                remaining: $machine->water_level_ml,
                unit: 'ml',
            ),

            new CoffeeContainer(
                name: config('coffee.containers.coffee.name'),
                capacity: $machine->coffee_capacity_grams,
                remaining: $machine->coffee_level_grams,
                unit: 'grams',
            )
        ));

        $this->app->bind(WaterContainer::class, fn () => new WaterContainer(...config('coffee.containers.water')));
        $this->app->bind(CoffeeContainer::class, fn () => new CoffeeContainer(...config('coffee.containers.coffee')));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

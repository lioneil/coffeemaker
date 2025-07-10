<?php

namespace App\Providers;

use App\Containers\CoffeeContainer;
use App\Containers\WaterContainer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(WaterContainer::class, fn () => new WaterContainer(...config('coffee.containers.water')));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Services;

use App\Models\Coffee;
use App\Services\Contracts\Serviceable;
use Illuminate\Support\Collection;

class CoffeeMachineService implements Serviceable
{
    public function addWater(float $quantity): void {}

    public function addCoffee(float $quantity): void {}

    /**
     * Retrieve all available coffee items.
     *
     * @return \Illuminate\Support\Collection
     */
    public function coffees(): Collection
    {
        return Coffee::all();
    }

    /**
     * @inheritDoc
     */
    public function status(): string
    {
        // TODO: Implement status() method.
    }

    /**
     * @inheritDoc
     */
    public function refill(): void
    {
        // TODO: Implement refill() method.
    }
}

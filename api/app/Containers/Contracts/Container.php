<?php

namespace App\Containers\Contracts;

interface Container
{
    /**
     * @param float $quantity liter/grams to be added to the container
     */
    public function add(float $quantity): void;

    /**
     * @param float $quantity liter/grams used to make a coffee
     *
     * @return float liter/grams remaining
     */
    public function use(float $quantity): float;

    /**
     * Returns the liters/grams left in the container
     */
    public function get(): float;
}

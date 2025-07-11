<?php

namespace App\Containers;

class CoffeeContainer extends AbstractContainer
{
    public function __construct(
        protected string $name = 'coffee',
        protected float $capacity = 500,
        protected float $remaining = 500,
        protected string $unit = 'g',
    ) {
        parent::__construct($name, $capacity, $remaining, $unit);
    }
}

<?php

namespace App\Containers;

class WaterContainer extends AbstractContainer
{
    public function __construct(
        protected string $name = 'water',
        protected float $capacity = 2.0,
        protected float $remaining = 2.0,
        protected string $unit = 'L',
    ) {
        parent::__construct($name, $capacity, $remaining, $unit);
    }
}

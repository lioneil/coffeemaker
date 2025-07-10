<?php

namespace App\Containers;

use App\Containers\Contracts\Container;
use App\Containers\Exceptions\ContainerOverflowException;
use App\Containers\Exceptions\InsufficientResourceException;

abstract class AbstractContainer implements Container
{
    public function __construct(
        protected string $name = 'container',
        protected float $capacity = 2.0,
        protected float $remaining = 2.0,
        protected string $unit = '',
    ) {
        $this->throwIfQuantityIsLessThanZero($this->capacity);
    }

    /**
     * @inheritDoc
     */
    public function add(float $quantity): void
    {
        $this->throwIfQuantityIsLessThanZero($quantity);

        $potential = $this->remaining + $quantity;

        $this->throwIfOverflow($potential, $quantity);

        $this->remaining += $quantity;
    }

    /**
     * @inheritDoc
     */
    public function use(float $quantity): float
    {
        $this->throwIfQuantityIsLessThanZero($quantity);

        $this->throwIfInsufficient($quantity);

        $this->remaining -= $quantity;

        return $this->remaining;
    }

    /**
     * @inheritDoc
     */
    public function get(): float
    {
        return $this->remaining;
    }

    /**
     * Retrieve the current capacity.
     *
     * @return float
     */
    public function capacity(): float
    {
        return $this->capacity;
    }

    /**
     * Validates that the provided quantity is greater than zero.
     *
     * @param  float  $quantity The quantity to validate.
     * @return void
     *
     * @throws \InvalidArgumentException If the quantity is less than or equal to zero.
     */
    protected function throwIfQuantityIsLessThanZero(float $quantity): void
    {
        if ($quantity <= 0) {
            throw new \InvalidArgumentException("{$this->name} amount must be greater than 0.");
        }
    }

    /**
     * Checks if the given quantity exceeds the container's capacity and throws an exception if it does.
     *
     * @param  float  $potential The potential quantity when added to the remaining level.
     * @param  float  $quantity The quantity to check against the container's capacity.
     * @return void
     * @throws ContainerOverflowException If the given quantity exceeds the container's capacity.
     */
    protected function throwIfOverflow(float $potential, float $quantity): void
    {
        if ($potential > $this->capacity) {
            throw new ContainerOverflowException("{$quantity}{$this->unit}");
        }
    }

    /**
     * Checks if the remaining resource is enough for the requested quantity.
     * Throws an exception if the resource is not enough.
     *
     * @param  float  $quantity The quantity to be checked against the remaining resource.
     * @return void
     * @throws InsufficientResourceException If the remaining resource is less than the requested quantity.
     */
    protected function throwIfInsufficient(float $quantity): void
    {
        if ($this->remaining < $quantity) {
            throw new InsufficientResourceException("{$quantity}{$this->unit}", "{$this->remaining}{$this->unit}", "Ran out of {$this->name}");
        }
    }
}

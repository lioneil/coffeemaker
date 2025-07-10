<?php

use App\Containers\WaterContainer;
use Illuminate\Support\Facades\Config;

uses(Tests\TestCase::class);

beforeEach(function () {
    Config::set('coffee.containers.water', [
        'name' => 'water',
        'capacity' => 2.0,
        'remaining' => 1.5,
        'unit' => 'L',
    ]);

    $this->container = app(WaterContainer::class);
});

it('uses water and returns remaining', function () {
    $this->container->use(0.5);
    expect($this->container->get())->toBe(1.0);
});

it('adds water correctly', function () {
    $this->container->add(0.5);
    expect($this->container->get())->toBe(2.0);
});

it('throws if water overflows', function () {
    $this->container->add(1.5);
})->throws(\App\Containers\Exceptions\ContainerOverflowException::class);

it('throws if not enough water to use', function () {
    $this->container->use(2.0);
})->throws(\App\Containers\Exceptions\InsufficientResourceException::class);

<?php /** @noinspection MultipleExpectChainableInspection */

use App\Containers\AbstractContainer;

beforeEach(function () {
    $this->container = new class('test', 10.0, 5.0, 'unit') extends AbstractContainer {};
});

it('retrieves the correct initial values', function () {
    expect($this->container->get())->toBe(5.0);
    expect($this->container->capacity())->toBe(10.0);
});

it('adds quantity and returns the resulting value', function () {
    $this->container->add(3.0);
    expect($this->container->get())->toBe(8.0);
});

it('throws overflow exception when adding too much', closure: function () {
    $this->container->add(5.0);
    $this->container->add(0.5);
})->throws(\App\Containers\Exceptions\ContainerOverflowException::class);

it('uses quantity and returns the remaining value', function () {
    $this->container->use(2.0);
    expect($this->container->get())->toBe(3.0);
});

it('throws an exception when using too much', function () {
    $this->container->use(10.0);
})->throws(\App\Containers\Exceptions\InsufficientResourceException::class);

it('throws an exception when adding negative or zero', function () {
    $this->container->add(0);
})->throws(\InvalidArgumentException::class);

it('throws an exception if initial values are invalid', function () {
    new class('bad', -1.0, 0, '') extends AbstractContainer {};
})->throws(InvalidArgumentException::class);

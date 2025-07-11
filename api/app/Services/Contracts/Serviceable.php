<?php

namespace App\Services\Contracts;

interface Serviceable
{
    /**
     * Retrieves the current status as a string.
     *
     * @return string The current status.
     */
    public function status(): string;

    /**
     * Refills the required resource.
     *
     * @return void
     */
    public function refill(): void;
}

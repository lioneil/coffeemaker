<?php

namespace App\Services\Contracts;

use App\Http\Resources\MachineResource;
use App\Models\Coffee;

interface Serviceable
{
    /**
     * Retrieves the current status as a string.
     *
     * @return \App\Http\Resources\MachineResource The current status.
     */
    public function status(): MachineResource;

    /**
     * Perform the brewing action.
     *
     * @param  \App\Models\Coffee  $coffee
     * @return void
     */
    public function brew(Coffee $coffee): void;

    /**
     * Refills the required resource.
     *
     * @return void
     */
    public function refill(): void;
}

<?php

namespace App\Services;

use App\Containers\CoffeeContainer;
use App\Containers\WaterContainer;
use App\Http\Resources\MachineResource;
use App\Models\Coffee;
use App\Models\Machine;
use App\Services\Contracts\Serviceable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CoffeeMachineService implements Serviceable
{
    public function __construct(
        protected Machine $machine,
        protected WaterContainer $water,
        protected CoffeeContainer $coffee,
    ) {}

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
     * @return \App\Models\Machine
     */
    public function machine(): Machine
    {
        return $this->machine;
    }

    /**
     * @inheritDoc
     */
    public function brew(Coffee $coffee): void
    {
        DB::transaction(function () use ($coffee) {
            $this->water->use($coffee->water_ml);
            $this->machine->water_level_ml = $this->water->get();

            $this->coffee->use($coffee->coffee_grams);
            $this->machine->coffee_level_grams = $this->coffee->get();

            $this->machine->save();
        });
    }

    /**
     * @inheritDoc
     */
    public function status(): MachineResource
    {
        return new MachineResource($this->machine());
    }

    /**
     * @inheritDoc
     */
    public function refill(array $amounts): void
    {
        DB::transaction(function () use ($amounts) {
            if (isset($amounts['water'])) {
                $this->water->add((float) $amounts['water']);
                $this->machine->water_level_ml = $this->water->get();
            }

            if (isset($amounts['coffee'])) {
                $this->coffee->add((float) $amounts['coffee']);
                $this->machine->coffee_level_grams = $this->coffee->get();
            }

            $this->machine->save();
        });
    }
}

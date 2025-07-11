<?php

namespace App\Http\Controllers\Coffee;

use App\Http\Controllers\Controller;
use App\Models\Coffee;
use App\Services\CoffeeMachineService;
use Illuminate\Http\Request;

class BrewCoffee extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Coffee $coffee, CoffeeMachineService $machine)
    {
        $machine->brew($coffee);

        return response()->json($machine->status());
    }
}

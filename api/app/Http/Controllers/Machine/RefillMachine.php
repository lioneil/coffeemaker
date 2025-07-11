<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use App\Services\CoffeeMachineService;
use Illuminate\Http\Request;

class RefillMachine extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, CoffeeMachineService $machine)
    {
        $machine->refill([
            'water' => $request->get('water'),
            'coffee' => $request->get('coffee'),
        ]);

        return response()->json($machine->status());
    }
}

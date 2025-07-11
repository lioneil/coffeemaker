<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use App\Services\CoffeeMachineService;
use Illuminate\Http\Request;

class CheckMachineHealthStatus extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, CoffeeMachineService $machine)
    {
        return response()->json($machine->status());
    }
}

<?php

namespace App\Http\Controllers\Api\Coffee;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoffeeResource;
use App\Services\CoffeeMachineService;
use Illuminate\Http\Request;

class GetCoffeeList extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, CoffeeMachineService $machine)
    {
        return response()->json(CoffeeResource::collection($machine->coffees()));
    }
}

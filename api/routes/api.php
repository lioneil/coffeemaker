<?php

use App\Http\Controllers\Api\Coffee\GetCoffeeList;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('coffees', GetCoffeeList::class);
});

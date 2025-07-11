<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/images/{file}', function (Request $request, string $file) {
    return response()->file(storage_path('app/public/images/'.$file));
});

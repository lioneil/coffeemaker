<?php

return [
    'containers' => [
        'water' => [
            'name' => 'water',
            'capacity' => env('COFFEE_MACHINE_WATER_CAPACITY', 2.0),
            'remaining' => env('COFFEE_MACHINE_WATER_REMAINING', 2.0),
            'unit' => 'L',
        ],

        'coffee' => [
            'name' => 'coffee',
            'capacity' => env('COFFEE_MACHINE_COFFEE_CAPACITY', 500.0),
            'remaining' => env('COFFEE_MACHINE_COFFEE_REMAINING', 500.0),
            'unit' => 'g',
        ],
    ],
];

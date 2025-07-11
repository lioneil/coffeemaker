<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'water_level_ml',
        'water_capacity_ml',
        'coffee_level_grams',
        'coffee_capacity_grams',
    ];

    protected $casts = [
        'water_level_ml' => 'float',
        'water_capacity_ml' => 'float',
        'coffee_level_grams' => 'float',
        'coffee_capacity_grams' => 'float',
    ];
}

<?php

namespace Database\Seeders;

use App\Models\Coffee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoffeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coffees = Coffee::all();

        if ($coffees->where('name', 'Espresso')->isEmpty()) {
            Coffee::factory()->espresso()->create();
        }

        if ($coffees->where('name', 'Double Espresso')->isEmpty()) {
            Coffee::factory()->double()->create();
        }

        if ($coffees->where('name', 'Ristretto')->isEmpty()) {
            Coffee::factory()->ristretto()->create();
        }

        if ($coffees->where('name', 'Americano')->isEmpty()) {
            Coffee::factory()->americano()->create();
        }
    }
}

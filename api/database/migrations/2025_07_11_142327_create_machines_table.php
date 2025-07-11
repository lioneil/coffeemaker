<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->index();
            $table->decimal('water_level_ml', 8, 2);
            $table->decimal('water_capacity_ml', 8, 2);
            $table->decimal('coffee_level_grams', 8, 2);
            $table->decimal('coffee_capacity_grams', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};

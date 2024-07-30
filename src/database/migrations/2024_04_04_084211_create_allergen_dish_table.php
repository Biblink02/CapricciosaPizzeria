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
        Schema::create('allergen_dish', function (Blueprint $table) {
            $table->uuid('allergen_uuid');
            $table->uuid('dish_uuid');
            $table->foreign('allergen_uuid')->references('uuid')->on('allergens')->onDelete('cascade');
            $table->foreign('dish_uuid')->references('uuid')->on('dishes')->onDelete('cascade');
            $table->unique(['allergen_uuid', 'dish_uuid']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allergen_dish');
    }
};

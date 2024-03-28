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
        Schema::create('dish_ingredient', function (Blueprint $table) {
            $table->uuid('dish_uuid');
            $table->uuid('ingredient_uuid');
            $table->foreign('dish_uuid')->references('uuid')->on('dishes')->onDelete('cascade');
            $table->foreign('ingredient_uuid')->references('uuid')->on('ingredients')->onDelete('cascade');
            $table->unsignedInteger('sort_key'); //0 is before 1 -> asc
            $table->unique(['dish_uuid', 'ingredient_uuid']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_ingredient');
    }
};

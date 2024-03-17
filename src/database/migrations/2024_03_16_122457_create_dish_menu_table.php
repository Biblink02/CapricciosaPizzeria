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
        Schema::create('dish_menu', function (Blueprint $table) {
            $table->uuid('dish_uuid');
            $table->uuid('menu_uuid');
            $table->foreign('dish_uuid')->references('uuid')->on('dishes')->onDelete('cascade');
            $table->foreign('menu_uuid')->references('uuid')->on('menu')->onDelete('cascade');
            $table->decimal('price', 10, 2, true);
            $table->unique(['dish_uuid', 'menu_uuid']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_menu');
    }
};

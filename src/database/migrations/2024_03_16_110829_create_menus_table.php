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
        Schema::create('menus', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('name');
            $table->string('img_url')->nullable();
            $table->boolean('is_visible');
            $table->boolean('is_visible_in_menus');
            $table->unsignedInteger('sort_key_in_menus'); //0 is before 1 -> asc
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

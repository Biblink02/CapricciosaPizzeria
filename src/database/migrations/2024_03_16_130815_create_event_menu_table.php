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
        Schema::create('event_menu', function (Blueprint $table) {
            $table->uuid('event_uuid');
            $table->uuid('menu_uuid');
            $table->foreign('event_uuid')->references('uuid')->on('events')->onDelete('cascade');
            $table->foreign('menu_uuid')->references('uuid')->on('menus')->onDelete('cascade');
            $table->unique(['event_uuid', 'menu_uuid']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_menu');
    }
};

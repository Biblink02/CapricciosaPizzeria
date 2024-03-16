<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('name');
            $table->string('img_url')->nullable();
            $table->boolean('is_visible');
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->timestamps();
        });
        //TODO verifica questa funzione per verificare che la data di inizio eventi sia prima di quella di fine evento
        Schema::table('events', function (Blueprint $table) {
            $table->check('ends_at > starts_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

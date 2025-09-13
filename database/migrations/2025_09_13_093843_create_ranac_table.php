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
        Schema::create('ranac', function (Blueprint $table) {
           $table->id();
            $table->string('model');
            $table->integer('zapremina');      // L
            $table->decimal('tezina', 6, 2);   // kg
            $table->decimal('price', 10, 2);   // cena
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranac');
    }
};

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
        Schema::create('sator', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('sezona');          // npr. "3-seasons"
            $table->integer('brOsoba');
            $table->decimal('tezina', 6, 2);
            $table->decimal('price', 10, 2);   // cena proizvoda
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sator');
    }
};

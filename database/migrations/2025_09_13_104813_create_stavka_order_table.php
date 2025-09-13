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
        Schema::create('stavka_order', function (Blueprint $table) {
             $table->id();

            $table->foreignId('order_id')->constrained('order')->cascadeOnDelete();
            $table->string('product_type');          // 'sator' | 'ranac'
            $table->unsignedBigInteger('product_id');// ID iz sator/ranac
            $table->index(['product_type', 'product_id']);

            $table->integer('quantity');
            $table->decimal('unit_price', 12, 2);    // snapshot cene u trenutku kupovine

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stavka_order');
    }
};

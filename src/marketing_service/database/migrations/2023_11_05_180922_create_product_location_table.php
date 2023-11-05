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
        Schema::create('product_location', function (Blueprint $table) {
            $table->id('id_product_location');
            $table->foreignId('id_product')->references('id_product')->on('product');
            $table->foreignId('id_warehouse')->references('id_warehouse')->on('warehouse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_location');
    }
};

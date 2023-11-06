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
            $table->string('id_product_location', 6)->primary();
            $table->string('id_product', 10);
            $table->string('id_warehouse', 6);
            $table->foreign('id_product')->references('id_product')->on('product');
            $table->foreign('id_warehouse')->references('id_warehouse')->on('warehouse');
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

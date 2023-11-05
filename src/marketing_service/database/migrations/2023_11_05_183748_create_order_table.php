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
        Schema::create('order', function (Blueprint $table) {
            $table->id('id_order', 10);
            $table->foreignId('PIC')->references('id_employee')->on('employee');
            $table->foreignId('id_customer')->references('id_customer')->on('customer');
            $table->foreignId('id_asset')->references('id_asset')->on('asset');
            $table->foreignId('id_product_location')->references('id_product_location')->on('product_location');
            $table->float('quantity', 100);
            $table->string('status', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};

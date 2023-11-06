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
            $table->string('id_order', 10)->primary();
            $table->string('PIC', 10);
            $table->string('id_customer', 10);
            $table->string('id_asset', 6);
            $table->string('id_product_location', 6);
            $table->foreign('PIC')->references('id_employee')->on('employee');
            $table->foreign('id_customer')->references('id_customer')->on('customer');
            $table->foreign('id_asset')->references('id_asset')->on('asset');
            $table->foreign('id_product_location')->references('id_product_location')->on('product_location');
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

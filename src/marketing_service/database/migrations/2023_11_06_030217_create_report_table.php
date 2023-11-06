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
        Schema::create('report', function (Blueprint $table) {
            $table->string('id_report', 10)->primary();
            $table->string('id_order', 10);
            $table->string('id_customer', 10);
            $table->foreign('id_order')->references('id_order')->on('order');
            $table->foreign('id_customer')->references('id_customer')->on('customer');
            $table->float('consumption');
            $table->float('remaining_product');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};

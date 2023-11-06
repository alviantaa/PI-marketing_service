<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('product', function (Blueprint $table) {
        $table->string('id_product', 10)->primary();
        $table->string('product_name', 50);
        $table->string('batch', 10);
        $table->text('description')->nullable();
        $table->float('price');
        $table->float('quantity');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

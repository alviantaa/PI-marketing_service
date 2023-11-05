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
        Schema::create('asset', function (Blueprint $table) {
            $table->id('id_asset', 6);
            $table->foreignId('id_warehouse')->references('id_warehouse')->on('warehouse');
            $table->foreignId('PIC')->references('id_employee')->on('employee');
            $table->string('asset_name', 100);
            $table->string('asset_type', 100);
            $table->string('spesification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset');
    }
};

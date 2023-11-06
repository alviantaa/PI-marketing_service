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
            $table->string('id_asset', 6)->primary();
            $table->string('id_warehouse', 6);
            $table->string('PIC', 10);
            $table->string('asset_name', 100);
            $table->string('asset_type', 100);
            $table->string('spesification');
            $table->foreign('id_warehouse')->references('id_warehouse')->on('warehouse');
            $table->foreign('PIC')->references('id_employee')->on('employee');
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

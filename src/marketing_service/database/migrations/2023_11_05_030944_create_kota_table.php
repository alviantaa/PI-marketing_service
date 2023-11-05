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
        Schema::create('kota', function (Blueprint $table) {
            $table->string('id_kota', 6)->primary();
            $table->string('name_kota', 100);
            $table->string('id_provinsi', 5);
            $table->foreign('id_provinsi')->references('id_provinsi')->on('provinsi');
            $table->string('lead_kota', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kota');
    }
};

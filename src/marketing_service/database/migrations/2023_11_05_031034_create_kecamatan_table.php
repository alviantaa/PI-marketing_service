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
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->string('id_kecamatan', 6)->primary();
            $table->string('name_kecamatan', 100);
            $table->string('id_kota', 6);
            $table->string('lead_kecamatan', 10);
            $table->foreign('id_kota')->references('id_kota')->on('kota');
            $table->foreign('lead_kecamatan')->references('id_employee')->on('employee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecamatan');
    }
};

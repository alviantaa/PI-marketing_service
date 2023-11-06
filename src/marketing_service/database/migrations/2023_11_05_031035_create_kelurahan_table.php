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
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->string('id_kelurahan', 6)->primary();
            $table->string('name_kelurahan', 20);
            $table->string('id_kecamatan', 6);
            $table->string('lead_kelurahan', 10);
            $table->foreign('id_kecamatan')->references('id_kecamatan')->on('kecamatan');
            $table->foreign('lead_kelurahan')->references('id_employee')->on('employee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelurahan');
    }
};

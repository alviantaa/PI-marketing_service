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
            $table->string('id_kelurahan', 8)->primary();
            $table->string('name_kelurahan', 20);
            $table->string('id_kecamatan', 7);
            $table->foreign('id_kecamatan')->references('id_kecamatan')->on('kecamatan');
            $table->string('lead_kelurahan', 7);
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

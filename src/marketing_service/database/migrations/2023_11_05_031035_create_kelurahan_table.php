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
            $table->id('id_kelurahan', 8);
            $table->string('name_kelurahan', 20);
            $table->foreignId('id_kecamatan')->references('id_kecamatan')->on('kecamatan');
            $table->foreignId('lead_kelurahan', 100)->reference('id_employee')->on('employee');
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

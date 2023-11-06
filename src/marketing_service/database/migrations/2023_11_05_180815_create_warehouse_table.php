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
        Schema::create('warehouse', function (Blueprint $table) {
            $table->string('id_warehouse', 6)->primary();
            $table->string('PIC', 10);
            $table->foreignId('id_level')->references('id_level')->on('level');
            $table->foreign('PIC')->references('id_employee')->on('employee');
            $table->string('name', 100);
            $table->float('capacity');
            $table->string('address', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse');
    }
};

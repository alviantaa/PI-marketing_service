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
        Schema::create('provinsi', function (Blueprint $table) {
            $table->string('id_provinsi', 6)->primary();
            $table->string('name_provinsi', 100);
            $table->string('id_branch', 6);
            $table->string('lead_provinsi', 10);
            $table->foreign('id_branch')->references('id_branch')->on('branch');
            $table->foreign('lead_provinsi')->references('id_employee')->on('employee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinsi');
    }
};

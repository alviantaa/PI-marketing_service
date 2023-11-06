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
        Schema::create('branch', function (Blueprint $table) {
            $table->string('id_branch', 6)->primary();
            $table->string('name_branch', 100);
            $table->string('id_region', 6);
            $table->string('lead_branch', 10);
            $table->foreign('id_region')->references('id_region')->on('region');
            $table->foreign('lead_branch')->references('id_employee')->on('employee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch');
    }
};

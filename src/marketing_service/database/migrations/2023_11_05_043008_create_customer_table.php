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
        Schema::create('customer', function (Blueprint $table) {
            $table->id('id_customer', 10);
            $table->string('name', 100);
            $table->string('email_cust', 100)->unique();
            $table->string('no_telp', 13);
            $table->char('sex', 1);
            $table->string('precise_location', 250);
            $table->foreignId('id_kelurahan')->references('id_kelurahan')->on('kelurahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};

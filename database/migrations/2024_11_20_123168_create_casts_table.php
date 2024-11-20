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
        Schema::create('casts', function (Blueprint $table) {
            $table->string('castID', 8)->unique();
            $table->string('movieID', 8);
            $table->string('name');
            $table->string('pathImage')->nullable();
            $table->foreign('movieID')->references('movieID')->on('movies')->onDelete('cascade');
            $table->primary('castID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casts');
    }
};

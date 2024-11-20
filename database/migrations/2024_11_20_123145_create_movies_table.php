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
        Schema::create('movies', function (Blueprint $table) {
            $table->string('movieID', 8)->unique();
            $table->string('movieTitle');
            $table->integer('duration');
            $table->text('synopsis')->nullable();
            $table->text('director');
            $table->text('writers')->nullable();
            $table->string('ageRating');
            $table->string('genre');
            $table->string('cover')->nullable();
            $table->primary('movieID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};

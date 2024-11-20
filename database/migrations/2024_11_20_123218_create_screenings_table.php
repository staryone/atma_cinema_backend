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
        Schema::create('screenings', function (Blueprint $table) {
            $table->string('screeningID', 8)->unique();
            $table->string('movieID', 8);
            $table->string('studioID', 8);
            $table->json('seatLayout');
            $table->date('date');
            $table->time('time');
            $table->decimal('price', 10, 2);
            $table->foreign('movieID')->references('movieID')->on('movies')->onDelete('cascade');
            $table->foreign('studioID')->references('studioID')->on('studios')->onDelete('cascade');
            $table->primary('screeningID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('screenings');
    }
};

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
        Schema::create('reviews', function (Blueprint $table) {
            $table->string('reviewID', 8)->unique();
            $table->string('userID', 8);
            $table->string('movieID', 8);
            $table->text('comment')->nullable();
            $table->unsignedTinyInteger('rating');
            $table->timestamp('reviewDate');
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');
            $table->foreign('movieID')->references('movieID')->on('movies')->onDelete('cascade');
            $table->primary('reviewID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

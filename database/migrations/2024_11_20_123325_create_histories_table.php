<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->string('historyID', 8)->unique();
            $table->string('userID', 8);
            $table->string('paymentID', 8);
            $table->string('reviewID', 8)->nullable();
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');
            $table->foreign('paymentID')->references('paymentID')->on('payments')->onDelete('cascade');
            $table->foreign('reviewID')->references('reviewID')->on('reviews')->onDelete('cascade');
            $table->primary('historyID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};

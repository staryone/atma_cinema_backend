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
        Schema::create('payments', function (Blueprint $table) {
            $table->string('paymentID', 8)->unique();
            $table->string('userID', 8);
            $table->string('paymentMethod');
            $table->enum('paymentStatus', ['pending', 'completed', 'failed']);
            $table->timestamp('paymentDate');
            $table->decimal('totalPayment', 10, 2);
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');
            $table->primary('paymentID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

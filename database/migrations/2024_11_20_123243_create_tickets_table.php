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
        Schema::create('tickets', function (Blueprint $table) {
            $table->string('ticketID', 8)->unique();
            $table->string('paymentID', 8);
            $table->string('seatID', 8);
            $table->enum('status', ['Success', 'cancelled']);
            $table->foreign('paymentID')->references('paymentID')->on('payments')->onDelete('cascade');
            $table->primary('ticketID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

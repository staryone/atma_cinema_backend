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
        Schema::create('users', function (Blueprint $table) {
            $table->string('userID', 8)->unique();
            $table->string('fullName');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('dateOfBirth');
            $table->date('registrationDate');
            $table->enum('gender', ['Male', 'Female', 'Undefined']);
            $table->string('phoneNumber');
            $table->string('profilePicture')->nullable();
            $table->primary('userID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

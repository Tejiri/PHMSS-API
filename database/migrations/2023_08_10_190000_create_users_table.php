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
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('firstName', 255);
            $table->string('lastName', 255);
            $table->string('middleName', 255)->nullable();
            $table->date('dateOfBirth');
            $table->string('address', 512);
            $table->string('postCode', 255);
            $table->string('phoneNumber', 255);
            $table->string('role');
            $table->string('gender', 255);
            $table->string('emergencyName', 255)->nullable();
            $table->string('emergencyPhoneNumber', 255)->nullable();
            $table->string('emergencyEmail', 255)->nullable();
            $table->string('emergencyRelationship', 255)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->unsignedBigInteger('doctorId')->nullable();
            $table->foreign('doctorId')->references("id")->on("doctors")->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
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

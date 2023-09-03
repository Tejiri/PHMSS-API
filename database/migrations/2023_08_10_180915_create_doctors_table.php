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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('username',255);
            $table->string('firstName',255);
            $table->string('lastName',255);
            $table->string('middleName',255)->nullable();
            $table->date('dateOfBirth',255);
            $table->string('address',255);
            $table->string('postCode',255);
            $table->string('phoneNumber',255);
            $table->string('role',255);
            $table->string('gender',255);
            $table->string('email',255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};

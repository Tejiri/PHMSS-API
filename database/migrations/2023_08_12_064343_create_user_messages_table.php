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
        Schema::dropIfExists('user_messages');
        Schema::create('user_messages', function (Blueprint $table) {
            $table->id();
            $table->boolean('read')->default(0); 
            $table->string('message');
            $table->string('type');
            $table->string('videoUrl')->nullable();
            $table->unsignedBigInteger('patientId');
            $table->unsignedBigInteger('doctorId');
            $table->foreign('patientId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('doctorId')->references('id')->on('doctors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_messages');
    }
};

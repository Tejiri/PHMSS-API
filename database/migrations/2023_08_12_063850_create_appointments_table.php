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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('reason');
            $table->string('appointmentDetials')->nullable();
            $table->time('startTime');
            $table->time('endTime');
            $table->dateTime('date');
            $table->string('status');
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
        Schema::dropIfExists('appointments');
    }
};

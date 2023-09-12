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
        Schema::dropIfExists('service_ratings');
        Schema::create('service_ratings', function (Blueprint $table) {
            $table->id();
            $table->decimal('rating',5,2);
            $table->string('description');
            $table->unsignedBigInteger('patientId')->unique();
            $table->unsignedBigInteger('doctorId');
            $table->foreign('patientId')->references('id')->on('users');
            $table->foreign('doctorId')->references('id')->on('doctors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_ratings');
    }
};

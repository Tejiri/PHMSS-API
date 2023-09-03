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
        Schema::create('illness_symptom', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('illnessId');
            $table->unsignedBigInteger('symptomId');
            $table->unique(['illnessId', 'symptomId']);
            $table->foreign('illnessId')->references('id')->on('illnesses')->onDelete('cascade');
            $table->foreign('symptomId')->references('id')->on('symptoms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('illness_symptom');
    }
};

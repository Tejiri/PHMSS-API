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
        Schema::dropIfExists('dietary_recommendations');
        Schema::create('dietary_recommendations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('illnessId');
            $table->string('name');
            $table->string('description');
            $table->string('imageUrl')->nullable();
            $table->foreign('illnessId')->references("id")->on("illnesses")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dietary_recommendations');
    }
};

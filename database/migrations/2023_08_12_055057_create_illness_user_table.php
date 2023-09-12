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
        Schema::dropIfExists('illness_user');
        Schema::create('illness_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('illnessId');
            $table->unsignedBigInteger('userId');
            $table->unique(['userId', 'illnessId']);
            $table->timestamps();
            $table->foreign('illnessId')->references('id')->on('illnesses')->onDelete('cascade');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('illness_user');
    }
};

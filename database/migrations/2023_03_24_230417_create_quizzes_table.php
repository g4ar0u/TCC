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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('pergunta');
            $table->text('resposta1');
            $table->text('resposta2');
            $table->text('resposta3');
            $table->text('respostaCerta');
            $table->unsignedBigInteger('figurinha_id');
            $table->foreign('figurinha_id')->references('id')->on('figurinhas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};

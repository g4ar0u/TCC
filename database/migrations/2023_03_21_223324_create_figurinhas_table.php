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
        Schema::create('figurinhas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 65);
            $table->text('desc');
            $table->enum('imgAtiva',['s',"n"])->default("n");
            $table->binary('imgOff');
            $table->binary('imgOn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('figurinhas');
    }
};

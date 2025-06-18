<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('teste_neurodivergencias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->json('answers'); // Respostas do formulário
            $table->json('scores')->nullable(); // Pontuação calculada
            $table->string('diagnosis'); // Diagnóstico principal
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('teste_neurodivergencias');
    }
};

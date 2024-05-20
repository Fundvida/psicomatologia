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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('psicologo_id')->nullable();
            $table->string('tipo_paciente')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('motivo');
            $table->string('estado')->nullable();
            $table->timestamps();
            //Si el paciente esta dado de alta isAlta = true
            $table->boolean('isAlta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};

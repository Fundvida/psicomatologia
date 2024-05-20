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
        Schema::create('sesions', function(Blueprint $table){
            $table->id();
            $table->string('estado');
            $table->boolean('pago_confirmado');
            $table->timestamp('fecha_hora_inicio')->nullable();
            $table->timestamp('fecha_hora_fin')->nullable();
            $table->foreignId('paciente_id');
            $table->foreignId('psicologo_id');
            $table->timestamps();
            $table->string('descripcion_sesion')->nullable();
            $table->smallInteger('calificacion')->nullable();
            $table->string('calificacion_descripcion')->nullable();
            $table->smallInteger('contador_cancelaciones')->nullable();
            $table->string('solicitante');
            $table->string('justificacion');
            $table->string('cancelador')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesions');
    }
};

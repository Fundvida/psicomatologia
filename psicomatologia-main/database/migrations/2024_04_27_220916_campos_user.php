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
        Schema::table('users', function (Blueprint $table) {
            /*El método de confirmación de cuenta se guarda en base de datos para que el sistema
              sepa cómo debe notificar a un usuario (puede tener 4 valores que son 
              sms, whatsapp, telegram, correo)*/
            $table->string('apellidos')->after('name')->nullable();
            $table->string('canal_comunicacion')->nullable();
            $table->smallInteger('contador_bloqueos')->nullable();
            $table->boolean('bloqueo_permanente')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('ci')->nullable();
            $table->string('codigo_pais_telefono')->nullable();
            $table->string('telefono')->nullable();
            $table->string('pregunta_seguridad_a')->nullable();
            $table->string('pregunta_seguridad_b')->nullable();
            $table->string('respuesta_seguridad_a')->nullable();
            $table->string('respuesta_seguridad_b')->nullable();
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

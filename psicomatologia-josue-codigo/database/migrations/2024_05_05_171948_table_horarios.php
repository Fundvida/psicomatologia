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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('psicologo_id');
            $table->time('hora_inicio_maniana')->nullable();
            $table->time('hora_fin_maniana')->nullable();
            $table->time('hora_inicio_tarde')->nullable();
            $table->time('hora_fin_tarde')->nullable();
            $table->string('dia')->nullable();
            $table->timestamps();
            //isDisponible es true si el horario no tiene una sesion agendada. Es false si se ha agendado una sesion en este horario
            $table->boolean('isDisponibleManiana');
            $table->boolean('isDisponibleTarde');
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};

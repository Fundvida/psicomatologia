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
        //Un psicólogo pueden tener 3 estados (activo, inactivo, ausente temporalmente)
        Schema::create('psicologos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            //Un psicólogo pueden tener 3 estados (activo, inactivo, ausente temporalmente)
            $table->string('estado');
            $table->timestamps();
            $table->date('fecha_funcion_titulo');
            $table->string('universidad');
            $table->string('ciudad_residencia');
            //$table->string('departamento_residencia');
            $table->string('pais_residencia');
            //los archivos del cv se guardan en la tabla archivos
            $table->string('descripcion_cv')->nullable();
            //$table->binary('foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psicologos');
    }
};

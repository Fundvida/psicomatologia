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
        Schema::create('fichas_de_atencion_terapeutica', function(Blueprint $table){
            $table->id();
            $table->timestamps();
            // Llave foránea
            $table->foreignId('sesion_id')->constrained()->onDelete('cascade');

            // Motivo de la Consulta
            $table->text('descripcion_problema')->nullable();
            $table->text('objetivos_terapeuticos')->nullable();

            // Evaluación del Estado Actual
            $table->tinyInteger('estado_emocional')->nullable();
            $table->tinyInteger('numero_sesion')->nullable();
            $table->text('sintomas_reportados')->nullable();
            $table->tinyInteger('nivel_estres')->nullable();
            $table->text('observaciones_terapeuta')->nullable();

            // Contenido de la Sesión
            $table->text('temas_tratados')->nullable();
            $table->text('tecnicas_utilizadas')->nullable();
            $table->text('intervenciones_especificas')->nullable();

            // Actividades y Tareas Asignadas
            $table->text('tareas_paciente')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->date('fecha_sesion')->nullable();

            // Progreso y Evaluación
            $table->text('progreso_objetivos')->nullable();
            $table->text('cambios_notables')->nullable();
            $table->text('retroalimentacion_paciente')->nullable();

            // Plan para la Próxima Sesión
            $table->text('objetivos_proxima_sesion')->nullable();
            $table->text('areas_enfoque')->nullable();
            $table->text('preparacion_necesaria')->nullable();

            // Notas Adicionales
            $table->text('notas_adicionales')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichas_de_atencion_terapeutica');
    }
};

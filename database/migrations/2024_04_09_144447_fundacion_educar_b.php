<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FundacionEducarB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_tutor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id');
            $table->foreignId('tutor_actual')->constrained('tutors');
            $table->foreignId('tutor_solicitante')->constrained('tutors');
            //los estados son pendiente y terminada
            $table->string('estado');
            $table->timestamps();
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_tutor');
    }
}

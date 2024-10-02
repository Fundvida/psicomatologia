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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('servicio')->nullable();
            $table->string('institucion')->nullable();
            $table->string('convenio')->nullable();
            $table->foreignId('sesion_id');
            $table->string('pago_tipo')->nullable();
            $table->timestamps();
            $table->boolean('isTerminado')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};

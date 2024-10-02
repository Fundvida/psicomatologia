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
        Schema::create('tutors', function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id');
        });

        Schema::create('paciente_tutor', function(Blueprint $table){
            $table->id();
            $table->foreignId('tutor_id');
            $table->foreignId('paciente_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paciente_tutor');
        Schema::dropIfExists('tutors');
    }
};

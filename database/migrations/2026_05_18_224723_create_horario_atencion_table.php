<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('horario_atencion', function (Blueprint $table) {

            $table->id('id_horario');

            $table->unsignedBigInteger('id_medico');

            $table->string('dia_semana', 15);

            $table->time('hora_inicio');

            $table->time('hora_fin');

            //Para controlar las fichas
            $table->integer('limite_pacientes')->default(15);

            $table->smallInteger('estado')->default(1);

            $table->timestamps();

            $table->foreign('id_medico')
                ->references('id_medico')
                ->on('medico')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horario_atencion');
    }
};
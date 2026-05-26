<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cita_medica', function (Blueprint $table) {

            $table->id('id_cita');
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_medico');
            $table->unsignedBigInteger('id_especialidad');
            $table->date('fecha_cita');
            $table->time('hora_cita');

            //CAMPOS AGREGADOS PATA EL CONTROL VISUAL Y FLUJO DE
            $table->integer('numero_ficha')->nullable();
            $table->string('estado_cita', 20)->default('Pendiente');


            $table->text('observaciones_consulta')->nullable();
            $table->smallInteger('estado')->default(1);
            $table->timestamps();

            $table->foreign('id_paciente')
                ->references('id_paciente')
                ->on('paciente')
                ->onDelete('cascade');

            $table->foreign('id_medico')
                ->references('id_medico')
                ->on('medico')
                ->onDelete('cascade');

            $table->foreign('id_especialidad')
                ->references('id_especialidad')
                ->on('especialidad')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cita_medica');
    }
};
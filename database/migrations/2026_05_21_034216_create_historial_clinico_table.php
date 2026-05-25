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
        Schema::create('historial_clinico', function (Blueprint $table) {
            $table->id('id_historial');


            // Relación 1 a 1 con la cita médica
            $table->unsignedBigInteger('id_cita')->unique();
            
            // Datos clínicos de la consulta
            $table->text('motivo_consulta')->nullable();
            $table->text('sintomas')->nullable();
            $table->text('diagnostico')->nullable();
            $table->text('tratamiento_receta')->nullable();
            
            // Constantes vitales (las suele llenar enfermería en triaje)
            $table->string('presion_arterial', 20)->nullable();
            $table->string('peso', 20)->nullable();
            $table->string('talla', 20)->nullable();

            $table->timestamps();

            // Llave foránea hacia la cita médica
            $table->foreign('id_cita')
                ->references('id_cita')
                ->on('cita_medica')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_clinico');
    }
};

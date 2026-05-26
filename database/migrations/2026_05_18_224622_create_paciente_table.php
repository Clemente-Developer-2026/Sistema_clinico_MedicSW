<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paciente', function (Blueprint $table) {

            $table->id('id_paciente');

            //Relacion nuevacon tabla 'users'
            $table->unsignedBigInteger('id_usuario')->unique();

            //Datos personales basicos
            $table->string('carnet_identidad', 20)->unique();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 20)->nullable();
            
            //CAMPOS DEMOGRAFICOS ACXTUAKLIZADOS
            $table->string('sexo',20)->nullable();
            $table->string('direccion',255)->nullable();
            $table->string('contacto_emergencia_nombre',150)->nullable();
            $table->string('contacto_emergencia_telefono',20)->nullable();
            $table->string('grupo_sanguineo',10)->nullable();
            $table->text('alergias')->nullable();
            $table->text('enfermedades_base')->nullable();

            $table->smallInteger('estado')->default(1);
            $table->timestamps();

            $table->foreign('id_usuario')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paciente');
    }
};
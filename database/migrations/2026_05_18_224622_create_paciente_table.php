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

            $table->unsignedBigInteger('id_usuario')->unique();

            $table->string('carnet_identidad', 20)->unique();

            $table->string('nombres', 100);

            $table->string('apellidos', 100);

            $table->date('fecha_nacimiento');

            $table->string('telefono', 20)->nullable();

            $table->smallInteger('estado')->default(1);

            $table->timestamps();

            $table->foreign('id_usuario')
                ->references('id_usuario')
                ->on('usuario')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paciente');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medico', function (Blueprint $table) {

            $table->id('id_medico');

            $table->unsignedBigInteger('id_usuario')->unique();

            $table->string('nombres', 100);

            $table->string('apellidos', 100);

            $table->date('fecha_nacimiento');

            $table->string('colegiatura', 50)->unique();

            $table->string('carnet_identidad', 20)->unique();

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
        Schema::dropIfExists('medico');
    }
};
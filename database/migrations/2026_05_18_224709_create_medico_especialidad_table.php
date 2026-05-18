<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medico_especialidad', function (Blueprint $table) {

            $table->id('id_medico_especialidad');

            $table->unsignedBigInteger('id_medico');

            $table->unsignedBigInteger('id_especialidad');

            $table->smallInteger('estado')->default(1);

            $table->timestamps();

            $table->foreign('id_medico')
                ->references('id_medico')
                ->on('medico')
                ->onDelete('cascade');

            $table->foreign('id_especialidad')
                ->references('id_especialidad')
                ->on('especialidad')
                ->onDelete('cascade');

            $table->unique([
                'id_medico',
                'id_especialidad'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medico_especialidad');
    }
};
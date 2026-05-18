<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('especialidad', function (Blueprint $table) {

            $table->id('id_especialidad');

            $table->string('nombre', 100)->unique();

            $table->string('descripcion', 255)->nullable();

            $table->smallInteger('estado')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('especialidad');
    }
};
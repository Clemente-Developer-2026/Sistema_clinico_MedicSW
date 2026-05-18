<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_auditoria', function (Blueprint $table) {

            $table->id('id_auditoria');

            $table->string('tabla_afectada', 50);

            $table->string('operacion', 10);

            $table->string('usuario_db', 50)->nullable();

            $table->timestamp('fecha_hora')
                ->useCurrent();

            $table->json('datos_anteriores')->nullable();

            $table->json('datos_nuevos')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_auditoria');
    }
};
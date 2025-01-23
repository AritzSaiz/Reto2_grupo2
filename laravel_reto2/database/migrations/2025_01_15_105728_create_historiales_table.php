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
        Schema::create('historiales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incidencia_id')->nullable(false);
            $table->unsignedBigInteger('tecnico_id')->nullable(false);
            $table->dateTime('entrada')->nullable(false);
            $table->dateTime('salida');
            $table->string('detalles_trabajo', 300);
            $table->string('justificacion_salida', 300);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('incidencia_id')->references('id')->on('incidencias');
            $table->foreign('tecnico_id')->references('id')->on('tecnicos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historiales');
    }
};

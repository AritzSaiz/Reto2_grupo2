<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mantenimientos_maquinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mantenimiento_id')->nullable(false);
            $table->unsignedBigInteger('maquina_id')->nullable(false);
            $table->dateTime('ultima_revision')->nullable(false);
            $table->dateTime('siguiente_revision')->nullable(false);
            $table->unsignedBigInteger('incidencia_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('mantenimiento_id')->references('id')->on('mantenimientos_preventivos');
            $table->foreign('maquina_id')->references('id')->on('maquinas');
            $table->foreign('incidencia_id')->references('id')->on('incidencias');
        });

        // Agregar la restricción CHECK
        DB::statement("ALTER TABLE mantenimientos_maquinas ADD CONSTRAINT ck_siguiente_revision CHECK (siguiente_revision > ultima_revision)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE mantenimientos_maquinas DROP CONSTRAINT IF EXISTS ck_siguiente_revision');

        Schema::dropIfExists('mantenimientos_maquinas');
    }
};

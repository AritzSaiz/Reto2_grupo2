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
        Schema::create('maquinas', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo')->nullable(false);
            $table->string('nombre', 60)->nullable(false);
            $table->string('modelo', 60)->nullable(false);
            $table->char('prioridad', 1)->nullable(false);
            $table->unsignedBigInteger('seccion_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('seccion_id')->references('id')->on('secciones');
        });

        // Restricción de la columna 'prioridad'.
        DB::statement("ALTER TABLE maquinas ADD CONSTRAINT MAQ_PRIO_CK CHECK (prioridad IN ('1', '2', '3'))");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar las restricciones explícitamente, por si en el futuro se necesita modificar o migrar parte de la estructura de la tabla.
        DB::statement('ALTER TABLE maquinas DROP CONSTRAINT IF EXISTS MAQ_PRIO_CK');

        Schema::dropIfExists('maquinas');
    }
};

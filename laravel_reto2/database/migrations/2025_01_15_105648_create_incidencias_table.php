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

        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 300)->nullable(false);
            $table->boolean('abierta')->default(true)->nullable(false);
            $table->string('categoria')->nullable(false);
            $table->string('gravedad')->nullable(false);
            $table->unsignedBigInteger('operario_id')->nullable(false);
            $table->unsignedBigInteger('maquina_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('operario_id')->references('id')->on('operarios');
            $table->foreign('maquina_id')->references('id')->on('maquinas');
        });

        // Restricción de la columna 'categoría'.
        DB::statement("ALTER TABLE incidencias ADD CONSTRAINT INCI_CATE_CK CHECK (categoria IN
                                                      ('Mecánica', 'Eléctrica', 'Neumática', 'Hidráulica',
                                                       'Informática', 'Instalaciones generales', 'Otros'))");

        // Restricción de la columna 'gravedad'.
        DB::statement("ALTER TABLE incidencias ADD CONSTRAINT INCI_GRAVE_CK CHECK (gravedad IN
                                                      ('No funciona', 'Sí funciona', 'Avería',
                                                       'Mantenimiento preventivo'))");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE incidencias DROP CONSTRAINT IF EXISTS INCI_CATE_CK');
        DB::statement('ALTER TABLE incidencias DROP CONSTRAINT IF EXISTS INCI_GRAVE_CK');

        Schema::dropIfExists('incidencias');
    }
};

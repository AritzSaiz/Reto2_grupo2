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
        Schema::create('secciones', function (Blueprint $table) {
            $table->id(); // Autoincremental y PK.
            $table->string('codigo', 10)->nullable(false);
            $table->string('campus', 20)->nullable(false);
            $table->timestamps(); // Crea los campos 'created_at' y 'updated_at'.
            $table->softDeletes(); // Crea el campo 'deleted_at'.
        });

        // Definir la restricción de la columna 'campus'.
        DB::statement("ALTER TABLE secciones ADD CONSTRAINT SECCI_CAMP_CK CHECK (campus IN
                                                         ('Arriaga', 'Mendizorroza', 'Molinuevo', 'Nieves Cano',
                                                          'Jesús Obrero'))");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar las restricciones explícitamente, por si en el futuro se necesita modificar o migrar parte de la estructura de la tabla.
        DB::statement('ALTER TABLE secciones DROP CONSTRAINT IF EXISTS SECCI_CAMP_CK');

        // Eliminar la tabla.
        Schema::dropIfExists('secciones');
    }
};

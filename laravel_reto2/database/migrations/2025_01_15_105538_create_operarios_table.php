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

        Schema::create('operarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60)->nullable(false);
            $table->string('apellidos', 60)->nullable(false);
            $table->string('email', 50)->nullable(false);
            $table->string('usuario', 20)->nullable(false);
            $table->string('contrasena', 255)->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            // Crear un índice compuesto para las columnas 'usuario' y 'contrasena'.
            // Este índice puede ser útil para las consultas frecuentes usando ambos campos a la vez; es decir, en el login.
            $table->index(['usuario', 'contrasena'], 'index_login');

            // Crear un índice único para la columna 'usuario' para asegurar que no haya usuarios duplicados.
            $table->unique('usuario');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operarios', function (Blueprint $table) {
            // Eliminar el índice compuesto.
            $table->dropIndex('index_login');

            // Eliminar el índice único.
            $table->dropUnique(['usuario']);
        });

        Schema::dropIfExists('operarios');
    }
};

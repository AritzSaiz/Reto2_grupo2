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
            $table->string('nombre', 50)->nullable(false);
            $table->unsignedBigInteger('campus_id')->nullable(false);
            $table->timestamps(); // Crea los campos 'created_at' y 'updated_at'.
            $table->softDeletes(); // Crea el campo 'deleted_at'.

            $table->foreign('campus_id')->references('id')->on('campuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la tabla.
        Schema::dropIfExists('secciones');
    }
};

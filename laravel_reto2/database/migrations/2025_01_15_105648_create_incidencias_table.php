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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 300)->nullable(false);
            $table->boolean('abierta')->default(true)->nullable(false);
            $table->unsignedBigInteger('categoria_id')->nullable(false);
            $table->unsignedBigInteger('gravedad_id')->nullable(false);
            $table->unsignedBigInteger('operario_id')->nullable(false);
            $table->unsignedBigInteger('maquina_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('gravedad_id')->references('id')->on('gravedades');
            $table->foreign('operario_id')->references('id')->on('operarios');
            $table->foreign('maquina_id')->references('id')->on('maquinas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidenciass');
    }
};

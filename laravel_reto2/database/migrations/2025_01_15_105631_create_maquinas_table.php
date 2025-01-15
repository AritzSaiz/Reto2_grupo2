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
        Schema::create('maquinas', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo')->nullable(false);
            $table->string('nombre', 60)->nullable(false);
            $table->string('modelo', 60)->nullable(false);
            $table->tinyInteger('prioridad')->nullable(false);
            $table->unsignedBigInteger('seccion_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('seccion_id')->references('id')->on('secciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maquinas');
    }
};

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
        Schema::create('mantenimientos_maquinas', function (Blueprint $table) {
            $table->unsignedBigInteger('mantenimiento_id');
            $table->unsignedBigInteger('maquina_id');
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['mantenimiento_id', 'maquina_id']);
            $table->foreign('mantenimiento_id')->references('id')->on('mantenimientos_preventivos');
            $table->foreign('maquina_id')->references('id')->on('maquinas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos_maquinas');
    }
};

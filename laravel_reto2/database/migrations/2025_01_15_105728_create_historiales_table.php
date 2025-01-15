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
            $table->unsignedBigInteger('incidencia_id');
            $table->unsignedBigInteger('tecnico_id');
            $table->dateTime('entrada')->nullable(false);
            $table->dateTime('salida')->nullable(false);
            $table->string('detalles', 300)->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['incidencia_id', 'tecnico_id']);
            $table->foreign('incidencia_id')->references('id')->on('incidencias');
            $table->foreign('tecnico_id')->references('id')->on('tecnicos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historials');
    }
};

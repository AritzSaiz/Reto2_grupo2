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
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operario_id')->nullable(false); // FK a la tabla operarios para obtener los demás datos del técnico.
            $table->boolean('disponible')->default(true)->nullable(false);
            $table->string('especialidad', 50)->nullable(false);
            $table->boolean('administrador')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('operario_id')->references('id')->on('operarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tecnicos');
    }
};

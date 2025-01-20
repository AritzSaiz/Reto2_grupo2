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
        Schema::create('mantenimientos_preventivos', function (Blueprint $table) {
            $table->id();
            $table->string('perioricidad', 20)->nullable(false);
            $table->dateTime('inicio_ultima_revision')->nullable(false);
            $table->dateTime('fin_ultima_revision')->nullable(false);
            $table->integer('dias')->nullable(false);
            $table->dateTime('siguiente_revision')->nullable(false);
            $table->unsignedBigInteger('maquina_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('maquina_id')->references('id')->on('maquinas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos_preventivos');
    }
};

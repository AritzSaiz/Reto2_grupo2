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
            $table->string('titulo')->nullable(false);
            $table->string('descripcion')->nullable(false);
            $table->string->integer('dias')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

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

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
            $table->string('descripcion')->nullable(false)->default("");
            $table->integer('dias')->nullable(false)->default(1);
            $table->dateTime('ultima_revision')->nullable(false)->default("2025-01-29 10:06:00");
            $table->dateTime('siguiente_revision')->nullable(false)->default("2025-03-29 10:06:00");
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

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
        Schema::create('secciones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 10)->nullable(false);
            $table->string('nombre', 50)->nullable(false);
            $table->unsignedBigInteger('campus_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('campus_id')->references('id')->on('campus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secciones');
    }
};

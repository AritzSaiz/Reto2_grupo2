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
            $table->id(); // Autoincremental y PK.
            $table->string('codigo', 10)->nullable(false);
            $table->string('campus', 20)->nullable(false);
            $table->timestamps(); // Crea los campos 'created_at' y 'updated_at'.
            $table->softDeletes(); // Crea el campo 'deleted_at'.
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

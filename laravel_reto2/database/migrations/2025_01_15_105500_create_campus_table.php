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
        Schema::create('campus', function (Blueprint $table) {
            $table->id(); // Autoincremental y PK.
            $table->string('codigo', 3)->nullable(false);
            $table->string('nombre', 50)->nullable(false);
            $table->string('direccion', 100)->nullable(false);
            $table->string('codigo_postal', 5)->nullable(false);
            $table->string('telefono', 9)->nullable(false);
            $table->string('email', 50)->nullable(false);
            $table->timestamps(); // Crea los campos 'created_at' y 'updated_at'.
            $table->softDeletes(); // Crea el campo 'deleted_at'.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campus');
    }
};

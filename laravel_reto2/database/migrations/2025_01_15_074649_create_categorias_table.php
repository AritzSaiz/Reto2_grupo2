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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id(); // Autoincremental y PK.
            $table->string('nombre', 30)->nullable(false);
            $table->timestamps(); // Crea los campos 'created_at' y 'updated_at'.
            $table->softDeletes(); // Crea el campo 'deleted_at'.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};

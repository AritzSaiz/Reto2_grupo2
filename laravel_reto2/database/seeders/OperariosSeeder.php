<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('operarios')->insert([
            // TODO : Luego poner las contraseñas como "12345" + validar en servidor que sean con 8 caracteres/minúsculas/mayúsculas...
            ['nombre' => 'Juan', 'apellidos' => 'Pérez López', 'email' => 'juan.perez@egibide.org', 'usuario' => 'jperez', 'contrasena' => bcrypt('Password1'), 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'María', 'apellidos' => 'González Díaz', 'email' => 'maria.gonzalez@egibide.org', 'usuario' => 'mgonzalez', 'contrasena' => bcrypt('Password2'), 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Luis', 'apellidos' => 'Martínez Ruiz', 'email' => 'luis.martinez@egibide.org', 'usuario' => 'lmartinez', 'contrasena' => bcrypt('Password3'), 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Ana', 'apellidos' => 'Hernández Gómez', 'email' => 'ana.hernandez@ikasle.egibide.org', 'usuario' => 'ahernandez', 'contrasena' => bcrypt('Password4'), 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Paco', 'apellidos' => 'Sánchez Torres', 'email' => 'paco.sanchez@ikasle.egibide.org', 'usuario' => 'psanchez', 'contrasena' => bcrypt('Password5'), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

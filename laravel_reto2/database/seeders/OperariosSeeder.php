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
            // Hemos puesto las contraseñas de manera sencilla para rapidez. En entorno real deberían de ser "con 8 caracteres, al menos una minúscula, una mayúscula, etc"
            ['nombre' => 'Juan', 'apellidos' => 'Pérez López', 'email' => 'juan.perez@egibide.org', 'usuario' => 'jperez', 'contrasena' => bcrypt('12345'), 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'María', 'apellidos' => 'González Díaz', 'email' => 'maria.gonzalez@egibide.org', 'usuario' => 'mgonzalez', 'contrasena' => bcrypt('12345'), 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Luis', 'apellidos' => 'Martínez Ruiz', 'email' => 'luis.martinez@egibide.org', 'usuario' => 'lmartinez', 'contrasena' => bcrypt('12345'), 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Ana', 'apellidos' => 'Hernández Gómez', 'email' => 'ana.hernandez@ikasle.egibide.org', 'usuario' => 'ahernandez', 'contrasena' => bcrypt('12345'), 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Paco', 'apellidos' => 'Sánchez Torres', 'email' => 'paco.sanchez@ikasle.egibide.org', 'usuario' => 'psanchez', 'contrasena' => bcrypt('12345'), 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Elena', 'apellidos' => 'Ruiz Martín', 'email' => 'elena.ruiz@ikasle.egibide.org', 'usuario' => 'eruiz', 'contrasena' => bcrypt('12345'), 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Carlos', 'apellidos' => 'García Pérez', 'email' => 'carlos.garcia@egibide.org', 'usuario' => 'cgarcia', 'contrasena' => bcrypt('12345'), 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Sofía', 'apellidos' => 'López Fernández', 'email' => 'sofia.lopez@ikasle.egibide.org', 'usuario' => 'slopez', 'contrasena' => bcrypt('12345'), 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'David', 'apellidos' => 'Rodríguez Sánchez', 'email' => 'david.rodriguez@egibide.org', 'usuario' => 'drodriguez', 'contrasena' => bcrypt('12345'), 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Isabel', 'apellidos' => 'Martín Gómez', 'email' => 'isabel.martin@ikasle.egibide.org', 'usuario' => 'imartin', 'contrasena' => bcrypt('12345'), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

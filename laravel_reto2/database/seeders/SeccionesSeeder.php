<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('secciones')->insert([
            ['codigo' => '5010', 'nombre' => 'Taller Mecánico 1  010', 'campus_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => '5011', 'nombre' => 'Taller Aurrera XXI', 'campus_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => '5012', 'nombre' => 'Taller Mecánico 2  012', 'campus_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => '5014', 'nombre' => 'Taller Control Numérico 014', 'campus_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => '5017', 'nombre' => 'Taller Mecánico 3  017', 'campus_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => '5018', 'nombre' => 'Laboratorio de Electricidad 018', 'campus_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => '5019', 'nombre' => 'Aula de Informática 019', 'campus_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => '5020', 'nombre' => 'Taller de Electrónica 020', 'campus_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => '5021', 'nombre' => 'Sala de Montaje 021', 'campus_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => '5022', 'nombre' => 'Almacén de Herramientas 022', 'campus_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ]);
    }
}

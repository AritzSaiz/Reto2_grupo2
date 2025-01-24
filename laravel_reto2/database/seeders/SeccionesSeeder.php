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
            ['codigo' => '5017', 'nombre' => 'Taller Mecánico 3  017', 'campus_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

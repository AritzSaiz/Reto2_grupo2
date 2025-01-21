<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaquinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('maquinas')->insert([
            ['codigo' => 5000001, 'nombre' => 'Torno Pinacho 0001', 'modelo' => 'Serie SH', 'prioridad' => '1', 'seccion_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => 5000002, 'nombre' => 'Torno Pinacho 0002', 'modelo' => 'Serie ST', 'prioridad' => '1', 'seccion_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => 5000003, 'nombre' => 'Torno Pinacho 0003', 'modelo' => 'Serie SE', 'prioridad' => '1', 'seccion_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => 5000004, 'nombre' => 'Torno Pinacho 0004', 'modelo' => 'Serie SL', 'prioridad' => '2', 'seccion_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => 5000005, 'nombre' => 'Torno Pinacho 0005', 'modelo' => 'Serie ML', 'prioridad' => '3', 'seccion_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

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
            [
                'codigo' => 1001,
                'nombre' => 'Torno CNC',
                'modelo' => 'TM-2000',
                'prioridad' => '1',
                'seccion_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 1002,
                'nombre' => 'Fresadora',
                'modelo' => 'FR-300',
                'prioridad' => '1',
                'seccion_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 2001,
                'nombre' => 'Impresora 3D',
                'modelo' => 'PR-500',
                'prioridad' => '1',
                'seccion_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 2002,
                'nombre' => 'Cortadora Láser',
                'modelo' => 'CL-100',
                'prioridad' => '1',
                'seccion_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 3001,
                'nombre' => 'Ordenador Principal',
                'modelo' => 'HP-200',
                'prioridad' => '2',
                'seccion_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 4001,
                'nombre' => 'Estantería de Almacén',
                'modelo' => 'E-230',
                'prioridad' => '2',
                'seccion_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 5001,
                'nombre' => 'PC de Oficina',
                'modelo' => 'HP-100',
                'prioridad' => '2',
                'seccion_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 1003,
                'nombre' => 'Taladradora',
                'modelo' => 'TA-330',
                'prioridad' => '2',
                'seccion_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 1004,
                'nombre' => 'Sierra',
                'modelo' => 'SI-200',
                'prioridad' => '3',
                'seccion_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 3002,
                'nombre' => 'Router',
                'modelo' => 'RT-10',
                'prioridad' => '3',
                'seccion_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 4002,
                'nombre' => 'Carretilla',
                'modelo' => 'CA-100',
                'prioridad' => '3',
                'seccion_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 5002,
                'nombre' => 'Impresora',
                'modelo' => 'PR-100',
                'prioridad' => '3',
                'seccion_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}

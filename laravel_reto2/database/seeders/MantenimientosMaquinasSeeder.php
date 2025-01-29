<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MantenimientosMaquinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mantenimientos_maquinas')->insert([
            // TODO : Acabar seeders

            [
                'mantenimiento_id' => 1,
                'maquina_id' => 1,
                'ultima_revision' => Carbon::create('2025-02-25 11:00:00'),
                'siguiente_revision' => Carbon::create('2025-03-25 11:00:00'),
                'incidencia_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ]

            /*
            ,
            [
                'mantenimiento_id' => 1,
                'maquina_id' => 2,
                'ultima_revision' => Carbon::create('2024-11-20 08:00:00'),
                'siguiente_revision' => Carbon::create('2025-01-19 08:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mantenimiento_id' => 1,
                'maquina_id' => 3,
                'ultima_revision' => Carbon::create('2024-12-20 08:00:00'),
                'siguiente_revision' => Carbon::create('2025-01-19 08:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mantenimiento_id' => 2,
                'maquina_id' => 1,
                'ultima_revision' => Carbon::create('2024-11-20 08:00:00'),
                'siguiente_revision' => Carbon::create('2025-01-19 08:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mantenimiento_id' => 2,
                'maquina_id' => 2,
                'ultima_revision' => Carbon::create('2024-10-20 12:00:00'),
                'siguiente_revision' => Carbon::create('2025-01-18 12:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mantenimiento_id' => 3,
                'maquina_id' => 4,
                'ultima_revision' => Carbon::create('2024-10-20 12:00:00'),
                'siguiente_revision' => Carbon::create('2025-02-18 12:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mantenimiento_id' => 4,
                'maquina_id' => 1,
                'ultima_revision' => Carbon::create('2024-12-10 16:00:00'),
                'siguiente_revision' => Carbon::create('2025-04-10 16:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mantenimiento_id' => 4,
                'maquina_id' => 2,
                'ultima_revision' => Carbon::create('2024-10-20 16:00:00'),
                'siguiente_revision' => Carbon::create('2025-04-10 16:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mantenimiento_id' => 4,
                'maquina_id' => 3,
                'ultima_revision' => Carbon::create('2024-10-20 16:00:00'),
                'siguiente_revision' => Carbon::create('2025-04-10 16:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mantenimiento_id' => 5,
                'maquina_id' => 1,
                'ultima_revision' => Carbon::create('2024-12-01 16:00:00'),
                'siguiente_revision' => Carbon::create('2025-05-20 16:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mantenimiento_id' => 5,
                'maquina_id' => 2,
                'ultima_revision' => Carbon::create('2024-10-20 16:00:00'),
                'siguiente_revision' => Carbon::create('2025-01-19 08:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mantenimiento_id' => 5,
                'maquina_id' => 3,
                'ultima_revision' => Carbon::create('2024-12-15 16:00:00'),
                'siguiente_revision' => Carbon::create('2025-02-13 18:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
            */

        ]);
    }
}

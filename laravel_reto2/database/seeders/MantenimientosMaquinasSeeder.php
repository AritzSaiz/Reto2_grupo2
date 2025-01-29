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
            [
                'mantenimiento_id' => 1,
                'maquina_id' => 2,
                // La 'ultima_revision' del 'mantenimiento_maquina' será un poco más tarde que la 'created_at' de la incidencia a la que deriva.
                'ultima_revision' => Carbon::create('2025-01-23 16:00:01'),
                // La 'siguiente_revision' se calcula sumando a 'ultima_revision' el valor de 'dias' del 'mantenimiento_preventivo' asociado.
                'siguiente_revision' => Carbon::create('2025-02-23 16:00:01'),
                /*
                 * La 'incidencia_id' es el id de la incidencia que se ha creado derivando de este
                 * 'mantenimiento_maquina'. Habría que crear primero la incidencia, luego hacer una consulta para
                 * averiguar su id teniendo en cuenta los datos que hay aquí, y acabar insertando aquí el id.
                 */
                'incidencia_id' => 4,
                // Las 'created_at' y 'updated_at' serán iguales que 'ultima_revision'.
                'created_at' => Carbon::create('2025-01-23 16:00:01'),
                'updated_at' => Carbon::create('2025-01-23 16:00:01'),
            ],
            [
                'mantenimiento_id' => 3,
                'maquina_id' => 3,
                'ultima_revision' => Carbon::create('2025-01-25 10:00:01'),
                'siguiente_revision' => Carbon::create('2025-04-25 10:00:01'),
                'incidencia_id' => 6,
                'created_at' => Carbon::create('2025-01-25 10:00:01'),
                'updated_at' => Carbon::create('2025-01-25 10:00:01'),
            ],
            [
                'mantenimiento_id' => 6,
                'maquina_id' => 6,
                'ultima_revision' => Carbon::create('2025-01-25 11:30:01'),
                'siguiente_revision' => Carbon::create('2025-07-24 11:30:01'),
                'incidencia_id' => 6,
                'created_at' => Carbon::create('2025-01-25 11:30:01'),
                'updated_at' => Carbon::create('2025-01-25 11:30:01'),
            ],
            [
                'mantenimiento_id' => 6,
                'maquina_id' => 8,
                'ultima_revision' => Carbon::create('2025-01-25 12:10:01'),
                'siguiente_revision' => Carbon::create('2025-07-24 12:10:01'),
                'incidencia_id' => 10,
                'created_at' => Carbon::create('2025-01-25 12:10:01'),
                'updated_at' => Carbon::create('2025-01-25 12:10:01'),
            ],
            [
                'mantenimiento_id' => 5,
                'maquina_id' => 10,
                'ultima_revision' => Carbon::create('2025-01-25 12:30:01'),
                'siguiente_revision' => Carbon::create('2025-05-25 12:30:01'),
                'incidencia_id' => 14,
                'created_at' => Carbon::create('2025-01-25 12:30:01'),
                'updated_at' => Carbon::create('2025-01-25 12:30:01'),
            ],
            [
                'mantenimiento_id' => 3,
                'maquina_id' => 13,
                'ultima_revision' => Carbon::create('2025-01-25 13:20:01'),
                'siguiente_revision' => Carbon::create('2025-04-25 13:20:01'),
                'incidencia_id' => 19,
                'created_at' => Carbon::create('2025-01-25 13:20:01'),
                'updated_at' => Carbon::create('2025-01-25 13:20:01'),
            ],
            [
                'mantenimiento_id' => 4,
                'maquina_id' => 16,
                'ultima_revision' => Carbon::create('2025-01-25 13:48:01'),
                'siguiente_revision' => Carbon::create('2025-05-25 13:48:01'),
                'incidencia_id' => 24,
                'created_at' => Carbon::create('2025-01-25 13:48:01'),
                'updated_at' => Carbon::create('2025-01-25 13:48:01'),
            ],
            [
                'mantenimiento_id' => 5,
                'maquina_id' => 18,
                'ultima_revision' => Carbon::create('2025-01-25 13:56:01'),
                'siguiente_revision' => Carbon::create('2025-05-25 13:56:01'),
                'incidencia_id' => 28,
                'created_at' => Carbon::create('2025-01-25 13:56:01'),
                'updated_at' => Carbon::create('2025-01-25 13:56:01'),
            ],
        ]);
    }
}

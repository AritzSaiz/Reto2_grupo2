<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HistorialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('historiales')->insert([
            [
                'incidencia_id' => 5,
                'tecnico_id' => 1,
                'entrada' => Carbon::create('2025-01-24 11:45:00'),
                'salida' => null,
                'detalles_trabajo' => null,
                'justificacion_salida' => null,
                'created_at' => Carbon::create('2025-01-24 11:45:00'),
                'updated_at' => Carbon::create('2025-01-24 11:45:00'),
            ],
            [
                'incidencia_id' => 5,
                'tecnico_id' => 1,
                'entrada' => Carbon::create('2025-01-24 11:45:00'),
                'salida' => Carbon::create('2025-01-24 12:15:00'),
                'detalles_trabajo' => 'Hice la inspección inicial e intenté hacer la extracción manual.',
                'justificacion_salida' => 'Me tuve que ir por un asunto médico.',
                'created_at' => Carbon::create('2025-01-24 12:15:00'),
                'updated_at' => Carbon::create('2025-01-24 12:15:00'),
            ],
            [
                'incidencia_id' => 5,
                'tecnico_id' => 2,
                'entrada' => Carbon::create('2025-01-22 12:20:00'),
                'salida' => null,
                'detalles_trabajo' => null,
                'justificacion_salida' => null,
                'created_at' => Carbon::create('2025-01-22 12:20:00'),
                'updated_at' => Carbon::create('2025-01-22 12:20:00'),
            ],
            [
                'incidencia_id' => 5,
                'tecnico_id' => 2,
                'entrada' => Carbon::create('2025-01-22 12:20:00'),
                'salida' => Carbon::create('2025-01-22 12:40:00'),
                'detalles_trabajo' => 'Realicé el desmontaje del portabrocas, la revisión, limpieza, reinstalación y prueba.',
                'justificacion_salida' => 'Incidencia resuelta con éxito.',
                'created_at' => Carbon::create('2025-01-22 12:40:00'),
                'updated_at' => Carbon::create('2025-01-22 12:40:00'),
            ],
        ]);
    }
}

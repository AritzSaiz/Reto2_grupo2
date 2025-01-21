<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncidenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incidencias')->insert([
            ['descripcion' => 'El torno no se calibra correctamente.', 'abierta' => true, 'categoria_id' => 1, 'gravedad' => 'No funciona', 'operario_id' => 1, 'maquina_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['descripcion' => 'Vibraciones excesivas durante el uso del torno.', 'abierta' => true, 'categoria_id' => 2, 'gravedad' => 'Sí funciona', 'operario_id' => 2, 'maquina_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['descripcion' => 'Error en la lectura del panel de control del torno.', 'abierta' => true, 'categoria_id' => 3, 'gravedad' => 'No funciona', 'operario_id' => 3, 'maquina_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['descripcion' => 'El torno se detiene inesperadamente al programar giros.', 'abierta' => true, 'categoria_id' => 4, 'gravedad' => 'No funciona', 'operario_id' => 4, 'maquina_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['descripcion' => 'Fallas en el motor principal del torno.', 'abierta' => false, 'categoria_id' => 5, 'gravedad' => 'Mantenimiento preventivo', 'operario_id' => 5, 'maquina_id' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

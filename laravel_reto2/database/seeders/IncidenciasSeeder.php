<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IncidenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incidencias')->insert([
            [
                'titulo' => 'Problema de arranque del torno',
                'descripcion' => 'El torno no arranca y aparece "Error" en la pantalla lateral informativa.',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 1,
                'maquina_id' => 1,
                // TODO : Poner fechas con --> Carbon::create('2025-01-25 10:00:00')
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'Fallo en el eje Z de la fresadora',
                'descripcion' => 'El eje Z de la fresadora ha dado un fallo y no sé por qué.',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 2,
                'operario_id' => 2,
                'maquina_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'Base de impresora 3D no calienta',
                'descripcion' => 'A la impresora 3D no se le calienta la base por motivo desconocido.',
                'abierta' => true,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 1,
                'operario_id' => 3,
                'maquina_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'Cortador láser no enciende',
                'descripcion' => 'El cortador láser no enciende desde esta mañana.',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 2,
                'operario_id' => 1,
                'maquina_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'PC se reinicia constantemente',
                'descripcion' => 'El PC se reinicia constantemente sin haber lanzado ningún comando.',
                'abierta' => true,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 2,
                'maquina_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'Mal estado en estantería',
                'descripcion' => 'Estantería en mal estado, una balda se tambalea.',
                'abierta' => false,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 3,
                'maquina_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'PC no enciende',
                'descripcion' => 'El PC no se enciende ni da señales de actividad.',
                'abierta' => false,
                'gravedad' => 'No funciona',
                'categoria_id' => 3,
                'operario_id' => 4,
                'maquina_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'Taladradora sin potencia',
                'descripcion' => 'La taladradora no tiene potencia y funciona despacio.',
                'abierta' => false,
                'gravedad' => 'Aviso',
                'categoria_id' => 4,
                'operario_id' => 4,
                'maquina_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'Sierra no corta recto',
                'descripcion' => 'La sierra no corta recto y se desvía en las placas finas de madera.',
                'abierta' => false,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 7,
                'operario_id' => 4,
                'maquina_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'Router sin conexión a red',
                'descripcion' => 'Router no se conecta a la red',
                'abierta' => false,
                'gravedad' => 'Aviso',
                'categoria_id' => 5,
                'operario_id' => 4,
                'maquina_id' => 5,
                'created_at' => Carbon::create('2025-01-25 10:00:00'),
                'updated_at' => Carbon::create('2025-01-25 10:00:00'),
                'deleted_at' => Carbon::create('2025-01-25 19:00:00'),
            ],
            [
                'titulo' => 'Limpieza General',
                'descripcion' => 'Limpieza rutinaria de la máquina',
                'abierta' => true,
                'gravedad' => 'Mantenimiento preventivo',
                'categoria_id' => 7,
                'operario_id' => null,
                'maquina_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]
        ]);
    }
}

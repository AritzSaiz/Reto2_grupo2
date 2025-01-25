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
            [
                'descripcion' => 'Problema de arranque del torno',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 1,
                'maquina_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'Fallo en el eje Z de la fresadora',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 2,
                'operario_id' => 2,
                'maquina_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'La impresora 3D no calienta la base',
                'abierta' => true,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 1,
                'operario_id' => 3,
                'maquina_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'El cortador láser no enciende',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 2,
                'operario_id' => 1,
                'maquina_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'El PC se reinicia constantemente',
                'abierta' => true,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 2,
                'maquina_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'Estantería en mal estado',
                'abierta' => false,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 3,
                'maquina_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'El PC no enciende',
                'abierta' => false,
                'gravedad' => 'No funciona',
                'categoria_id' => 3,
                'operario_id' => 4,
                'maquina_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'La taladradora no tiene potencia',
                'abierta' => false,
                'gravedad' => 'Aviso',
                'categoria_id' => 4,
                'operario_id' => 4,
                'maquina_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'La sierra no corta recto',
                'abierta' => false,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 5,
                'operario_id' => 4,
                'maquina_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'Router no se conecta a la red',
                'abierta' => false,
                'gravedad' => 'Aviso',
                'categoria_id' => 5,
                'operario_id' => 4,
                'maquina_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'Limpieza rutinaria de la máquina',
                'abierta' => true,
                'gravedad' => 'Mantenimiento preventivo',
                'categoria_id' => 5,
                'operario_id' => 1,
                'maquina_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

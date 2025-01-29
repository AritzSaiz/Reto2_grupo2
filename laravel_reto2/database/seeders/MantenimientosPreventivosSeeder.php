<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MantenimientosPreventivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mantenimientos_preventivos')->insert([
            // TODO : Acabar seeders

            [
                'titulo' => 'Limpieza General',
                'descripcion' => 'Limpieza rutinaria de la máquina',
                'dias' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Engrasado',
                'descripcion' => 'Engrasado de las partes móviles',
                'dias' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Ajuste de Componentes',
                'descripcion' => 'Revisión y ajuste de tornillos y piezas',
                'dias' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Calibración',
                'descripcion' => 'Calibración de la máquina',
                'dias' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Revisión Eléctrica',
                'descripcion' => 'Revisión de los cables y conexiones eléctricas',
                'dias' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Actualización Software',
                'descripcion' => 'Actualización del software de la máquina',
                'dias' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Revisión Neumática',
                'descripcion' => 'Revisión de los elementos neumáticos de la máquina',
                'dias' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

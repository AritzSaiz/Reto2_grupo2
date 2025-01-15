<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categorias = [
            'Mecánica',
            'Eléctrica',
            'Neumática',
            'Hidráulica',
            'Informática',
            'Instalaciones generales',
            'Otros'
        ];

        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert([
                'nombre' => $categoria,
                'created_at' => Carbon::now(), // 'Carbon::now()' devuelve la fecha y hora actuales con buen formato.
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}

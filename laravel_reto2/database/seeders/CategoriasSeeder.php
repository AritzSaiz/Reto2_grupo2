<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['nombre' => 'Mecánica'],
            ['nombre' => 'Eléctrica'],
            ['nombre' => 'Neumática'],
            ['nombre' => 'Hidráulica'],
            ['nombre' => 'Informática'],
            ['nombre' => 'Instalaciones generales'],
            ['nombre' => 'Otra'],
            ]);
    }
}

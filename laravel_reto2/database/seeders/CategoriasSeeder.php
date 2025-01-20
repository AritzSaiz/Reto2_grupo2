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
            ['nombre' => 'Mecánica', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Eléctrica', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Neumática', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Hidráulica', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Informática', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Instalaciones generales', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Otra', 'created_at' => now(), 'updated_at' => now()],
            ]);
    }
}

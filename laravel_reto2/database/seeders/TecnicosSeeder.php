<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TecnicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tecnicos')->insert([
            ['operario_id' => 1, 'especialidad' => 'Electricidad', 'administrador' => true, 'created_at' => now(), 'updated_at' => now()],
            ['operario_id' => 2, 'especialidad' => 'Mecánica', 'administrador' => false, 'created_at' => now(), 'updated_at' => now()],
            ['operario_id' => 5, 'especialidad' => 'Electrónica', 'administrador' => false, 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}

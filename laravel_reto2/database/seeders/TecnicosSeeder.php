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
            ['operario_id' => 1, 'especialidad' => 'Electricidad', 'admin' => true, 'created_at' => now(), 'updated_at' => now()],
            ['operario_id' => 2, 'especialidad' => 'Mecánica', 'admin' => false, 'created_at' => now(), 'updated_at' => now()],
            ['operario_id' => 5, 'especialidad' => 'Electrónica', 'admin' => false, 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}

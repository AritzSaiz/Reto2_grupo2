<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GravedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $gravedades = [
            'No funciona',
            'Sí funciona',
            'Avería',
            'Mantenimiento preventivo'
        ];

        foreach ($gravedades as $gravedad) {
            DB::table('gravedades')->insert([
                'nombre' => $gravedad,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}

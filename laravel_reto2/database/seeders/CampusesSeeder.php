<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('campuses')->insert([
            ['codigo' => '1', 'nombre' => 'Arriaga', 'direccion' => 'C/ Pozoa s/n', 'codigo_postal' => '01013', 'telefono' => '945010110', 'email' => 'arriaga@egibide.org'],
        ]);
    }
}

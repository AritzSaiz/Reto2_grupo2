<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('campus')->insert([
            ['codigo' => '01', 'nombre' => 'Arriaga', 'direccion' => 'C/ Pozoa s/n', 'codigo_postal' => '01013', 'telefono' => '945010110', 'email' => 'arriaga@egibide.org', 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => '02', 'nombre' => 'Mendizorroza', 'direccion' => 'Plaza Amadeo García Salazar, 2 (Frontones)', 'codigo_postal' => '01007', 'telefono' => '945010140', 'email' => 'mendizorrotza@egibide.org', 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => '03', 'nombre' => 'Molinuevo', 'direccion' => 'C/ San Ignacio, 6', 'codigo_postal' => '01001', 'telefono' => '945010120', 'email' => 'molinuevo@egibide.org', 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => '04', 'nombre' => 'Nieves Cano', 'direccion' => 'C/ Nieves Cano, 10', 'codigo_postal' => '01006', 'telefono' => '945010130', 'email' => 'nievescano@egibide.org', 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => '05', 'nombre' => 'Jesús Obrero', 'direccion' => 'C/ Francia, 32', 'codigo_postal' => '01002', 'telefono' => '945000333', 'email' => 'jesusobrero@egibide.org', 'created_at' => now(), 'updated_at' => now()],
            ]);
    }
}

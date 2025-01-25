<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Llamar a los seeders específicos en el orden correcto (teniendo en cuenta las FK).
        $this->call([
            CampusSeeder::class,
            SeccionesSeeder::class,
            OperariosSeeder::class,
            TecnicosSeeder::class,
            MaquinasSeeder::class,
            CategoriasSeeder::class,
            MantenimientosPreventivosSeeder::class,
            IncidenciasSeeder::class,
            MantenimientosMaquinasSeeder::class,
            HistorialesSeeder::class,
        ]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Llamar a los seeders específicos.
        $this->call([
            CategoriasSeeder::class,
            GravedadesSeeder::class,
            SeccionesSeeder::class,
            OperariosSeeder::class,
            TecnicosSeeder::class,
            MaquinasSeeder::class,
            IncidenciasSeeder::class,
            MantenimientosSeeder::class,
            HistorialesSeeder::class,
        ]);

    }
}

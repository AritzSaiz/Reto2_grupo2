<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\ActualizarRevisiones;

class Kernel extends ConsoleKernel
{
    /**
     * Las definiciones de los comandos de Artisan.
     *
     * @var array
     */
    protected $commands = [
        // Registra el comando personalizado
        ActualizarRevisiones::class,
    ];

    /**
     * Defina las tareas programadas para tu aplicación.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Aquí puedes programar tareas. Por ejemplo:
        // Esto ejecutará el comando 'revisiones:actualizar' todos los días.
        $schedule->command('revisiones:actualizar')->daily(); // Se ejecuta diariamente
    }

    /**
     * Registra las tareas en la consola.
     *
     * @return void
     */
    protected function commands()
    {
        // Cargar los comandos de las rutas
        $this->load(__DIR__.'/Commands');

        // Cargar las rutas de comandos de consola
        require base_path('routes/console.php');
    }
}

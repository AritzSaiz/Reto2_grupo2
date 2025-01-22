<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\MantenimientoController;

class ActualizarRevisiones extends Command
{
    protected $signature = 'revisiones:actualizar';
    protected $description = 'Actualiza las revisiones de los mantenimientos vencidos';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        app(MantenimientoController::class)->actualizarRevisiones();
        $this->info('Revisiones actualizadas correctamente.');
    }
}

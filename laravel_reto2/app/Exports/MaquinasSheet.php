<?php

namespace App\Exports;

use App\Models\Maquina;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;

class MaquinasSheet implements FromArray, WithTitle
{
    public function array(): array
    {
        $data = Maquina::join('secciones', 'maquinas.seccion_id', '=', 'secciones.id')
            ->join('campus', 'secciones.campus_id', '=', 'campus.id')
            ->select('maquinas.codigo', 'maquinas.nombre', 'secciones.codigo as sección', 'campus.codigo as campus', 'maquinas.prioridad')
            ->get()
            ->toArray();

        $headers = [['código', 'nombre', 'sección', 'campus', 'prioridad']];
        return array_merge($headers, $data);
    }

    public function title(): string
    {
        return 'Máquinas';
    }
}

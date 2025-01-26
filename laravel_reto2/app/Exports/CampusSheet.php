<?php

namespace App\Exports;

use App\Models\Campus;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;

class CampusSheet implements FromArray, WithTitle
{
    public function array(): array
    {
        // Consultar los datos de la tabla
        $data = Campus::select('id', 'nombre')->get()->toArray();
        // Establecer los encabezados
        $headers = [['nº campus', 'nombre']];
        // Combinar los encabezados con los datos
        return array_merge($headers, $data);
    }

    public function title(): string
    {
        return 'Campus';
    }
}

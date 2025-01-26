<?php

namespace App\Exports;

use App\Models\Categoria;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;

class CategoriaIncidenciaSheet implements FromArray, WithTitle
{
    public function array(): array
    {
        $data = Categoria::select('id', 'nombre')->get()->toArray();
        $headers = [['nº tipo avería', 'nombre']];
        return array_merge($headers, $data);
    }

    public function title(): string
    {
        return 'Categorías de las incidencias';
    }
}

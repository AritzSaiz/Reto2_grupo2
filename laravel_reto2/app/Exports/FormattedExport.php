<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class FormattedExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new CampusSheet(),
            new CategoriaIncidenciaSheet(),
            new MaquinasSheet(),
        ];
    }
}

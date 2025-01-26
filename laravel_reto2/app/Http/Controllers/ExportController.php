<?php

namespace App\Http\Controllers;

use App\Exports\FormattedExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportar()
    {
        return Excel::download(new FormattedExport, 'datos_exportados.xlsx');
    }
}

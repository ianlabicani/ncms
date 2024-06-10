<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
use App\Models\Patient;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Maatwebsite\Excel\Facades\Excel;

class ExportDataController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new ExportData, 'patients.xlsx');
    }

    public function exportPdf()
    {
        $patients = Patient::all();
        $pdf = FacadePdf::loadView('export.pdf-export-record', compact('patients'))->setPaper('a4', 'landscape');;
        return $pdf->download('patients.pdf');
    }
}

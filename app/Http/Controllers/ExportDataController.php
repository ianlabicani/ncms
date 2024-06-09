<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
use App\Models\Patient;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ExportDataController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new ExportData, 'patients.xlsx');
    }

    public function exportPdf()
    {
        $patients = Patient::all();
        $pdf = PDF::loadView('export.pdf-export-record', compact('patients'))->setPaper('a4', 'landscape');;
        return $pdf->download('patients.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class PdbExportPdfController extends Controller
{
    //
    public function generatePdf()
    {
        $data = [
            'title' => 'Laporan PDF',
            'content' => 'Ini adalah konten laporan dalam format PDF.',
        ];

        $pdf = PDF::loadView('pdf.report', $data);
        return $pdf->download('report.pdf');
    }
}

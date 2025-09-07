<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achat;
use Barryvdh\DomPDF\PDF;

class PDFController extends Controller
{
    public function downloadPDF()
    {
        // Retrieve dynamic data from your database or any other source
        $achats = Achat::all(); // Example data retrieval, adjust as per your application logic

        // Pass the dynamic data to the PDF view
        $data = ['achats' => $achats];

        // Generate PDF with dynamic content
        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('pdf.template', $data);

        // Return PDF as a download
        return $pdf->download('customized_pdf_file.pdf');
    }
}

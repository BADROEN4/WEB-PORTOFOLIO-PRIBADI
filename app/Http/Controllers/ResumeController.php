<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ResumeController extends Controller
{
    public function download()
    {
        $pdf = PDF::loadView('resume_pdf')->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        return $pdf->download('resume_Farhan_Badru_Tamam.pdf');
    }
}

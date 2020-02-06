<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use http\Env\Response;
use PDF;

class ReportController extends Controller {
	public function generate_pdf() 
	{
		$data = [
			'foo' => 'bar'
		];
		$pdf = PDF::loadView('pdf.document', $data);
		return $pdf->stream('document.pdf');
	}
}


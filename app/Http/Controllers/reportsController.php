<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;


class reportsController extends Controller
{
    public function test()
    {
        $content = 'test';
        $html2pdf = new HTML2PDF('P','A4','en',false,'UTF-8');
        $html2pdf->writeHTML($content);
        $html2pdf->output('helloworld.pdf');
    }
}

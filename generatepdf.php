<?php

// require_once __DIR__ . '/vendor/autoload.php';

// $pdf = new \Dompdf\Dompdf();
// $html = file_get_contents("tes.html");
// $pdf->loadHtml($html);
// $pdf->setPaper("A4,", "Portrait");
// $pdf->render();
// $pdf->stream("test.pdf", array("Attachment" => FALSE));

// sudah dipindah di fungsi

require "fungsi.php";
generatepdf();

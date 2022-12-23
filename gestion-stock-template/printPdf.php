<?php
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;


// instantiate and use the dompdf class
$dompdf = new Dompdf();

ob_start();

require_once 'facture/index.php';

$html = ob_get_contents();

ob_end_clean();

$dompdf->loadHtml($html);



// (Optional) Setup the paper size and orientation
// $dompdf->setPaper('A4', 'landscape');
$paper_orientation = 'landscape';
$customPaper = array(0, 0, 950, 950);
$dompdf->set_paper($customPaper, $paper_orientation);

// Render the HTML as PDF
$dompdf->render();

// echo ($html);

// Output the generated PDF to Browser
$dompdf->stream("bill");
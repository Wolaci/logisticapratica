<?php

use Dompdf\Dompdf;
require_once 'dompdf/autoload.inc.php';


$dompdf = new DOMPDF();

$dompdf->load_html('
	<h1>gerar pdf</h1>
	');

$dompdf->render();
$dompdf->stream(
  'teste.pdf',
  array(
  	"Attachment" => false
  )
);

?>;
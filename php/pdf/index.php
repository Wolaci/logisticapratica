<?php
session_start();
$login=$_SESSION['login'];
use Dompdf\Dompdf;
require_once 'dompdf/autoload.inc.php';
include '../POO/Usuario.php';
$u = new Usuario;
$u->conectar();

ob_start();
include 'saida.php';
$html=ob_get_contents();
ob_end_clean();



$dompdf = new DOMPDF();

$dompdf->loadHtml($html);

$dompdf-> setPaper('A4','portrait');

$dompdf->render();

$dompdf->stream('relatòrio.pdf',['Attachment'=>false]);


?>
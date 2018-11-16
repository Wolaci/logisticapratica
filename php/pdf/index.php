<?php
session_start();
$login=$_SESSION['login'];
use Dompdf\Dompdf;
require_once 'dompdf/autoload.inc.php';
include '../POO/Usuario.php';
$u = new Usuario;
$u->conectar();

$html = "<html>";
$html .="<head>";
$html .="<style></style>"

$html .="</head>";
$html .="<body>";
$html .="</body>";
$html .= "</html>";
// $html .='<thead>';

// $html .='<tr>';


// $html .='<td>nome</td>';
// $html .='<td>quantidade</td>';


// $html .='</tr>';
// $html .='</thead>';


// $saida = $conn->prepare('SELECT * FROM saida WHERE login =:l');
// $saida->bindValue(':l',$login);
// $saida->execute();


while ($res=$saida->fetch(PDO::FETCH_ASSOC)) {
	$html .='<tbody>';
	$html .= '<tr><td>'.$res['nome'].'</td>';
	$html .= '<td>'.$res['quantidade'].'</td></tr>';
	$html .='</tbody>';
}

$html .='</table>';


$dompdf = new DOMPDF();

$dompdf->loadHtml($html);

$dompdf-> setPaper('A4','portrait');

$dompdf->render();

$dompdf->stream('relatòrio.pdf',['Attachment'=>false]);


?>
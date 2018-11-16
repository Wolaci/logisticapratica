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
$html .="<style>
@color-gray: #BCBCBC;
.text {
	&-center { text-align: center; }
}
.ttu { text-transform: uppercase; }

.printer-ticket {
	display: table !important;
	width: 100%;
	max-width: 400px;
	font-weight: light;
	line-height: 1.3em;
	@printer-padding-base: 10px;
	&, & * { 
		font-family: Tahoma, Geneva, sans-serif; 
		font-size: 10px; 
	}

	th:nth-child(2),
	td:nth-child(2) {
		width: 50px;
	}
	
	th:nth-child(3) ,
	td:nth-child(3) { 
		width: 90px; text-align: right; 
	}
	
	th { 
		font-weight: inherit;
		padding: @printer-padding-base 0;
		text-align: center;
		border-bottom: 1px dashed @color-gray;
	}
	tbody {
		tr:last-child td { padding-bottom: @printer-padding-base; }
	}
	tfoot {
		.sup td {
			padding: @printer-padding-base 0;
			border-top: 1px dashed @color-gray;
		}
		.sup.p--0 td { padding-bottom: 0; }
	}
	
	.title { font-size: 1.5em; padding: @printer-padding-base*1.5 0; }
	.top {
		td { padding-top: @printer-padding-base; }
	}
	.last td { padding-bottom: @printer-padding-base; }
}
        </style>"
$html .="</head>";
$html .="<body>";
$html .='<table class="printer-ticket">';
$html .="<thead>";
$html .="<tr>";
$html .=	'<th class="title" colspan="3">Logística Prática</th>'
$html .="</tr>";
$html .="<tr>";	
$html .=    '<th colspan="3">17/11/2015 - 11:57:52</th>';
$html .="</tr>";
$html .="<tr>";
$html .=    '<th colspan="3">Nome do cliente<br>
             000.000.00</th>';	
$html .="<tr>";
$html .="<tr>";
$html .=    '<th class="ttu" colspan="3">Nome do cliente<br>
             000.000.00</th>';	
$html .="<tr>";
$html .="</thead>";

$html .="</table>"
$html .="<tbody>";
while ($res=$saida->fetch(PDO::FETCH_ASSOC)) {
	
	$html .= '<tr class="top"><td>'.$res['nome'].'</td>';
	$html .= '<td>'.$res['quantidade'].'</td></tr>';
	
}
$html .=	"</tbody>";
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



$html .='</table>';


$dompdf = new DOMPDF();

$dompdf->loadHtml($html);

$dompdf-> setPaper('A4','portrait');

$dompdf->render();

$dompdf->stream('relatòrio.pdf',['Attachment'=>false]);


?>
<?php
session_start();
include '../POO/Usuario.php';
$login=$_SESSION['login'];

$u = new Usuario;
$u->conectar();
$nomes=$conn->prepare('SELECT * FROM produto_pdo WHERE fk_user = :f');
$nomes->bindValue(":f",$login);
$nomes->execute();
$_saida=$nomes->fetchALL(PDO::FETCH_ASSOC);


ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
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
	</style>
</head>
<body>
	<table class="printer-ticket">
		<thead>
			<tr>
				<th class="title" colspan="3">Victor Shop</th>
			</tr>
			<tr>
				<th colspan="3">17/11/2015 - 11:57:52</th>
			</tr>
			<tr>
				<th colspan="3">
					Nome do cliente <br />
					000.000.000-00
				</th>
			</tr>
			<tr>
				<th class="ttu" colspan="3">
					<b>Cupom não fiscal</b>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr class="top">
				<td colspan="3">Doce de brigadeiro</td>
			</tr>
			<tr>
				<td>R$7,99</td>
				<td>2.0</td>
				<td>R$15,98</td>
			</tr>
			<tr>
				<td colspan="3">Opcional Adicicional: grande</td>
			</tr>
			<tr>
				<td>R$0,33</td>
				<td>2.0</td>
				<td>R$0,66</td>
			</tr>
			<?php foreach ($_saida as $list) : ?>
				<tr>
					<td><?= $list['nome']?><td><td><?=$list['quantidade']?></td>
				</tr>

			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr class="sup ttu p--0">
				<td colspan="3">
					<b>Totais</b>
				</td>
			</tr>
			<tr class="ttu">
				<td colspan="2">Sub-total</td>
				<td align="right">R$43,60</td>
			</tr>
			<tr class="ttu">
				<td colspan="2">Taxa de serviço</td>
				<td align="right">R$4,60</td>
			</tr>
			<tr class="ttu">
				<td colspan="2">Desconto</td>
				<td align="right">5,00%</td>
			</tr>
			<tr class="ttu">
				<td colspan="2">Total</td>
				<td align="right">R$45,56</td>
			</tr>
			<tr class="sup ttu p--0">
				<td colspan="3">
					<b>Pagamentos</b>
				</td>
			</tr>
			<tr class="ttu">
				<td colspan="2">Voucher</td>
				<td align="right">R$10,00</td>
			</tr>
			<tr class="ttu">
				<td colspan="2">Dinheiro</td>
				<td align="right">R$10,00</td>
			</tr>
			<tr class="ttu">
				<td colspan="2">Total pago</td>
				<td align="right">R$10,00</td>
			</tr>
			<tr class="ttu">
				<td colspan="2">Troco</td>
				<td align="right">R$0,44</td>
			</tr>
			<tr class="sup">
				<td colspan="3" align="center">
					<b>Pedido:</b>
				</td>
			</tr>
			<tr class="sup">
				<td colspan="3" align="center">
					www.site.com
				</td>
			</tr>
		</tfoot>
		
	</table>
</body>
</html>
<?php
$html=ob_get_clean();

require_once 'vendor/autoload.php';
use Dompdf\Dompdf;
//instancia o DOMPDF
$dompdf = new Dompdf();

//inserindo o HTML no PDF;
$dompdf->loadHtml ($html);

//definindo papel e orientação
$dompdf->setPaper('A4', 'portrait');

//renderizando HTML no PDF
$dompdf->render();

//enviando o PDF pro navegador
$dompdf->stream('relatorio.pdf', array('Attachment' => false));

?>
<?php 
class Produto {
	public $conn;



	function cadastroDeProdutos($Usuario, $nome, $codigo, $validade, $chegada, $lote, $quant){
		global $conn;
	$consulta = $conn->prepare("INSERT INTO produto_pdo(nome,codigo,validade,chegada,lote,fk_user,quantidade)
	 VALUES (?,?,?,?,?,?,?)");
	$consulta->bindParam(1,$nome);
	$consulta->bindParam(2,$codigo);
	$consulta->bindParam(3,$validade);
	$consulta->bindParam(4,$chegada);
	$consulta->bindParam(5,$lote);
	$consulta->bindParam(6,$Usuario);
	$consulta->bindParam(7,$quant);
	$consulta->execute();
	}
}

?>

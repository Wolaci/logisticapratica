<?php 
class Produto {
	public $conn;



	function cadastroDeProdutos($Usuario, $nome, $codigo, $validade, $chegada, $lote, $quant,$est){
		global $conn;
	$consulta = $conn->prepare("INSERT INTO produto_pdo(nome,codigo,validade,chegada,lote,fk_user,quantidade,estoque)
	 VALUES (?,?,?,?,?,?,?,?)");
	// $consulta->bindParam(1,$nome);
	// $consulta->bindParam(2,$codigo);
	// $consulta->bindParam(3,$validade);
	// $consulta->bindParam(4,$chegada);
	// $consulta->bindParam(5,$lote);
	// $consulta->bindParam(6,$Usuario);
	// $consulta->bindParam(7,$quant);
	$consulta->execute([$nome,$codigo,$validade,$chegada,$lote,$Usuario,$quant,$est]);
	}
}

?>

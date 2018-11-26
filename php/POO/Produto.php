<?php 
class Produto {
	public $conn;



	function cadastroDeProdutos($Usuario, $nome, $codigo, $validade, $chegada, $lote, $quant,$est){
		global $conn;
		$consulta = $conn->prepare("INSERT INTO produto_pdo(nome,codigo,validade,chegada,lote,fk_user,quantidade,estoque)
			VALUES (?,?,?,?,?,?,?,?)");

		$consulta->execute([$nome,$codigo,$validade,$chegada,$lote,$Usuario,$quant,$est]);
	}
	function returnIdProd($prod,$comp,$quantcomp,$log)
	{

      global $conn;
			$compoe = $conn->prepare('INSERT INTO compoe(id_produto,id_componente,quantidade,user_comp) 
				VALUES (?,?,?)');
			$compoe->execute([$prod,$comp,$quantcomp]);
		
	}
	function saida($code,$quant,$log){
		global $conn;

		$vender = $conn->prepare("SELECT nome,quantidade FROM produto_pdo  WHERE codigo = ? AND fk_user=?");
		$vender->execute([$code,$log]); 
		$adc=$vender->fetch();
		$soma=$adc[1]-$quant;

		$adicionar=$conn->prepare('UPDATE produto_pdo SET quantidade = ? WHERE codigo = ?  ');
		$adicionar->execute([$soma,$code]);

		$saidaE= $conn->prepare('INSERT INTO Saida(nome,login,quantidade) VALUES (?,?,?) ');
		$saidaE->execute([$adc[0],$log,$quant]);
	}
}

?>

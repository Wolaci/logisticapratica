<?php 
class Produto {
	public $conn;



	function cadastroDeProdutos($Usuario, $nome, $codigo, $validade, $chegada, $lote, $quant,$est){
		global $conn;
		$consulta = $conn->prepare("INSERT INTO produto_pdo(nome,codigo,validade,chegada,lote,fk_user,quantidade,estoque)
			VALUES (?,?,?,?,?,?,?,?)");

		$consulta->execute([$nome,$codigo,$validade,$chegada,$lote,$Usuario,$quant,$est]);
	}
	function returnIdProd($prod,$prodcod,$comp,$compcod,$quantcomp)
	{
		global $conn;


		$addProd=$conn->prepare('SELECT id,quantidade FROM produto_pdo WHERE nome = ? AND codigo = ?');
		$addProd->execute([$prod,$prodcod]);

		$addComp = $conn->prepare('SELECT id,quantidade FROM produto_pdo WHERE nome = ? AND codigo = ?');

		$addComp->execute([$comp,$compcod,]);
		$a = $addProd->fetch();
		$b = $addComp->fetch();
		if($b[1]>$quantcomp){
			$_SESSION['quant_er']=true;
			echo "foi";
		}


		if ($addProd->rowCount()>0 && $addComp->rowCount()>0) {
			$compoe = $conn->prepare('INSERT INTO compoe(id_produto,id_componente,quantidade) 
				VALUES (?,?,?)');
			$compoe->execute([$a[0],$b[0],$quantcomp]);
		}
	}
	function saida($code,$quant,$log){
		global $conn;

		$vender = $conn->prepare("SELECT nome,quantidade FROM produto_pdo  WHERE codigo = ? OR nome = ?");
		$vender->execute([$code]); 
		$adc=$vender->fetch();
		$soma=$adc[1]-$quant;

		$adicionar=$conn->prepare('UPDATE produto_pdo SET quantidade = ? WHERE codigo = ?  ');
		$adicionar->execute([$soma,$code]);

		$saidaE= $conn->prepare('INSERT INTO Saida(nome,quantidade,login) VALUES (?,?,?) ');
		$saidaE->execute([$adc[0],$quant,$log]);
	}
}

?>

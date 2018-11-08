<?php

session_start();	
if ($_SESSION['login']) {
	
include 'POO/Usuario.php';
$u= new Usuario;
$u->conectar();
$nomeUs=$_SESSION['login'];
require_once ('menu.php');
}else{
	header('location: /php/login/login.php');
}			

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" media="screen" href="../css/css.css" />
	
</head>
<body>

<fieldset class="field_cadastro">

 <h2>Cadastro</h2>

	<form action="cadprod/addNome.php" method="POST">
	
		<b>Cadastre o Produto</b>
		<input type="text" name="nome" placeholder="Digite o nome do Produto" > 

		<b>Cadastre o Código do Produto</b>
		<input type="text" name="codigo" placeholder="Digite o codigo do Produto"><br>

		<b>Validade do Produto</b><br>
		<input type="date" name="validade" placeholder="dd/mm/aaaa"><br>

		<br><b>Data da Chegada do Produto a Loja</b><br>
		<input type="date" name="chegada" placeholder="dd/mm/aaaa"><br>
		
		<br><b>Cadastre o lote do Produto</b>
		<input type="text" name="lote" placeholder="Digite o lote">

		<b>Quantidade</b><br>
		<input type="number" name="quant" placeholder="Escolha a quantidade" required>



		<input class="botao_cadastro" type="submit" value="Cadastrar no Sistema">
	</form>
</fieldset>

<fieldset class="field_estoque">
	
<h2>Estoque</h2>


	<table border="1" cellpadding="5" cellspacing="0">
		<tr>

			<th>Nome</th>
			<th>Código</th>
			<th>Validade</th>
			<th>Chegada</th>
			<th>Lote</th>
			<th>Quantidade</th>
			<th>Excluir</th>

		</tr>
		<?php 
		
		
		
		$nomes=$conn->prepare('SELECT * FROM produto_pdo WHERE fk_user = :f');
		$nomes->bindValue(":f",$nomeUs);


		
		$nomes->execute();
		// $res = $nomes->fetch(PDO::FETCH_ASSOC);


		while($res = $nomes->fetch(PDO::FETCH_ASSOC)):	
		  
		
		?>
								<tr>
									<td><?= $res['nome'] ?></td>
									<td><?=$res['codigo'] ?></td>
									<td><?=$res['validade']?></td>
									<td><?=$res['chegada']?></td>
									<td><?=$res['lote']?></td>
									<td><?=$res['quantidade']?></td>
									<td><a href="/php/cadprod/rmNome.php?id=<?= $res['id'] ?>"><img src="../img/excluir.png"></excluir></a></td>
								</tr> 
								<?php endwhile; ?>
	</table>
</fieldset>	
<a href="login/logout.php"><button class="botao_sair">Sair</button></a>

</body>
</html>
<?php
 $alert=$conn->prepare('SELECT * FROM produto_pdo WHERE fk_user = :f');
 $alert->bindValue(":f",$nomeUs);
 $alert->execute();
 $a=$alert->fetch();
 $b=$a[7];
 if($alert->rowCount()>0){
 if($b<=0){

    echo '<div class="container" style="text-align:center; border:2px solid #f00;   background-color:rgba(255,0,0,0.6);">';
    
      echo "É necessário uma reposição de estoque";
    
    echo '</div>';
  }

}

?>
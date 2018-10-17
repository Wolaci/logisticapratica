
<?php
session_start();
if ($_SESSION['login']) {
	
include 'cadprod/conexao.php';

require_once 'cabecalho.php';
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

<fieldset>

 <h1>Cadastro</h1>

	<form action="cadprod/addNome.php" method="POST">
	
		<h3>Cadastre o Produto</h3>
		<input type="text" name="nome" placeholder="Digite o nome do Produto" > 

		<h3>Cadastre o Código do Produto</h3>
		<input type="text" name="codigo" placeholder="Digite o codigo do Produto" >

		<h3>Validade do Produto</h3>
		<input type="date" name="validade" placeholder="dd/mm/aaaa">

		<h3>Data da Chegada do Produto a Loja</h3>
		<input type="date" name="chegada" placeholder="dd/mm/aaaa">
		
		<h3>Cadastre o lote do Produto</h3>
		<input type="text" name="lote" placeholder="Digite o lote">


		<input type="submit" value="Cadastrar no Sistema">
	</form>
</fieldset>

<fieldset class="nav">
	
<h1>Estoque</h1>


	<table border="1" cellpadding="5" cellspacing="0">
		<tr>
			<th>nome</th>
			<th>codigo</th>
			<th>validade</th>
			<th>chegada</th>
			<th>lote</th>
			<th>Excluir</th>

		</tr>
		<?php 
		
		$nomeUs=$_SESSION['login'];
		
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
									<td><a href="/php/cadprod/rmNome.php?id=<?= $res['id'] ?>">X</a></td>
									
								</tr> 
								<?php endwhile; ?>
	</table>
</fieldset>	
<a href="login/logout.php"><button>sair</button></a>
</body>
</html>

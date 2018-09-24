<?php

include 'conexao.php';

if($conn){
	echo "conexão realizada";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<style type="text/css">
		h1{
			text-align: center;
		}

		form{
			text-align: center;
		}

		body{
			background: #ccc;
		}

		fieldset{
			width: 30%;
			margin: auto;
		}

		td{
			text-align: center;
		}

		a{
			text-decoration: none;
		}

	</style>
</head>
<body>
<h1>Nome</h1>

<fieldset>
	<form action="addNome.php" method="POST">
		<input type="text" name="nome" placeholder="Digite seu Nome" required=""> 
		<input type="submit">
	</form>

	<table border="1" cellpadding="5" cellspacing="0">
		<tr>
			<th>nome</th>
			<th>Excluir</th>
			<th>Atualizar</th>
		</tr>
		<?php 
		
		$nomes='SELECT * FROM nome';
		$result = $conn->query($nomes);
		
		while($res = $result->fetch(PDO::FETCH_ASSOC)):?>
								<tr>
									<td><?= $res['nome'] ?></td>
									<td><a href="rmNome.php?id=<?= $res['id'] ?>">X</a></td>
									<td><a href="updateNome.php?id=<?= $res['id'] ?>">V</a></td>
								</tr> 
								<?php endwhile; ?>
	</table>
</fieldset>	
</body>
</html>

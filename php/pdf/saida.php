<?php
include 'POO/Usuario.php';
$u = new Usuario();
$u->conectar();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table style="text-align: center border:1px black solid ;">
		<h1>Vendas</h1>
		<tr>
			<th>nome</th>
			<th>quantidade</th>
		</tr>
		<?php
	     $saida = $conn->prepare('SELECT * FROM saida WHERE login =:l');
	     $saida->bindValue(':l',$login);
	     $saida->execute();

		while($res = $saida->fetch(PDO::FETCH_ASSOC)):

			?>
			<tr>
				<td><?=$res['nome']?></td>
				<td><?=$res['quantidade']?></td>
			</tr>
		<?php endwhile; ?>
	</table>

	</body>
</html>
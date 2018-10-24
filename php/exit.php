<?php 
require_once('../index.php');
session_start();
$login=$_SESSION['login'];

include 'POO/Usuario.php';
$u = new Usuario();
$u->conectar();
?>


<form method="POST" action="/php/cadprod/exitPdo.php">
	<div class="imgcontainer">
	</div>
	<div class="container">
		<label for="uname"><b>Digite o código do Produto</b></label>
		<input type="text" placeholder="Inserir codigo" name="code" required>
		<input type="number" placeholder="Inserir quantidade" name="quantities">
		<button type="submit">Vender Produtos</button>		
		<label>
		</div>

	</form>


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
		<a href="/php/pdf/index.php"><button type="submit"  class="container"> efetuar comprar</button></a>

</body>
</html>
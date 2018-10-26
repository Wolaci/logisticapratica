<?php 
require_once('../index.php');


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

    <div class="imgcontainer" style="margin-right: 30%;
	margin-left: 30%;">
	<table class="ui inverted table" style="text-align:center;">
		<h1>Vendas</h1>
		<tr>
			<th>nome</th>
			<th>quantidade</th>
		</tr>
		<?php
	     $saida = $conn->prepare('SELECT * FROM Saida WHERE login =:l');
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
	<a href="/php/pdf/pdf/index.php"><button type="submit"  class="container"> efetuar comprar</button></a>
	</div>
	
		

</body>
</html>
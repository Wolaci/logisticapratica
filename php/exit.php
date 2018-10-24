<?php 
require_once('../index.php');
session_start();
$log=$_SSESSION['login'];
?>
<div class="container" style="background-color:#f1f1f1">
	<a href="/php/cadastro.php"><button type="button" class="cancelbtn">Cadastrar Produtos</button></a>
</div>

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
		<?php
		//$saida=$conn->prepare('SELECT nome,quantidade FROM saida WHERE login = ?');

		//$saida=execute([$log]);

		?>


	</form>
</body>
</html>
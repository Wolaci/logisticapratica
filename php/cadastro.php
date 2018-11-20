<?php
session_start();	
if (isset($_SESSION['login'])) {
	
	include 'POO/Usuario.php';
	$u= new Usuario;
	$u->conectar();
	$nomeUs=$_SESSION['login'];
	require_once ('menu.php');
}else{
	header('location: /php/login/login.php');
}			
		
?>
<body>
<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12" >
				<div class="produto" >
					<h2>Cadastro de Produtos</h2>
					<fieldset>
						<form action="cadprod/addNome.php" method="POST">
							<ul>
								<li>Cadastre o Produto</li>
								<input type="text" name="nome" placeholder="Digite o nome do Produto">

								<li>Cadastre o Código do Produto</li>
								<input type="text" name="codigo" placeholder="Digite o codigo do Produto">

								<li>Validade do Produto</li>
								<input type="date" name="validade" placeholder="dd/mm/aaaa">

								<li>Data da Chegada do Produto a Loja</li>
								<input type="date" name="chegada" placeholder="dd/mm/aaaa">

								<li>Cadastre o lote do Produto</li>
								<input type="text" name="lote" placeholder="Digite o lote">

								<li>Quantidade</li>
								<input type="number" name="quant" placeholder="Escolha a quantidade" required>

								<li>Estoque de segurança</li>
								<input type="number" name="estoque" placeholder="Estoque de segurança" required>

							</div>
							<input class="botao_cadastro" type="submit" value="Cadastrar no Sistema">
						</ul>
					</form>
				</fieldset>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">	
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
						<td><?php 
							//$alert=$conn->prepare('SELECT quantidade FROM produto_pdo WHERE fk_user = :f AND nome="$res[nome]" AND quantidade="0"');
							$alert=$conn->prepare('SELECT quantidade FROM produto_pdo WHERE fk_user = ? AND quantidade=?'); 
							$alert->bindValue(1,$nomeUs);
							$alert->bindValue(2,$res['quantidade']);
							$alert->execute();
							$a=$alert->fetch();
							$b=$a[0];
							

							if($b<=0){
								echo "<img width='30px' height='30px' src='../img/alert.png'>";
								}else{
									echo "<img width='30px' height='30px' src='../img/okay.png'>";
									} ?></td>
						</tr> 
					<?php endwhile; ?>
				</table>	
				
			</div>
		</body>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	

		</html>
		<?php
		$alert=$conn->prepare('SELECT quantidade FROM produto_pdo WHERE fk_user = :f');
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
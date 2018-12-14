<?php
session_start();
require 'menu.php';
include 'POO/Usuario.php';
$u= new Usuario();
$u -> conectar();
$nomeUs=$_SESSION['login'];
?>
<div class="container">
<div class="row">
			<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
			<div class="produto">	
				<h1>Estoque</h1>
				<table border="1" cellpadding="5" cellspacing="0">
					<tr>
						<th>Nome</th>
						<th>Código</th>
						<th>Validade</th>
						<th>Chegada</th>
						<th>Lote</th>
						<th>Quantidade</th>
						<th>Estoque de Segurança</th>
						<th>Excluir</th>
						<th>Update</th>
						<th>Situação do Produto</th>
					</tr>
					<?php 



					$nomes=$conn->prepare('SELECT * FROM produto_pdo WHERE fk_user = :f');
					$nomes->bindValue(":f",$nomeUs);
					$nomes->execute();
		// $res = $nomes->fetch(PDO::FETCH_ASSOC);


					while($res = $nomes->fetch(PDO::FETCH_ASSOC)):	


						?>
					<tr>
						<td><a href="/php/cadprod/altNome.php?serio=<?= $res['id']?>"><?= $res['nome'] ?></a></td>
						<td><?=$res['codigo'] ?></td>
						<td><?=$res['validade']?></td>
						<td><?=$res['chegada']?></td>
						<td><?=$res['lote']?></td>
						<td><?=$res['quantidade']?></td>
						<td><?=$res['estoque']?></td>
						<td><a href="/php/cadprod/rmNome.php?id=<?= $res['id'] ?>"><img height="30px" width="30lpx" src="../img/lixeiraNew.png"></excluir></a></td>
						<td><a href="/php/cadprod/altNome.php?serio=<?= $res['id'] ?>"> <img src="../img/up.jpg" width="30px" height="30px"></a></td> 
						
						<td><?php 
							$alert=$conn->prepare('SELECT quantidade,estoque FROM produto_pdo WHERE fk_user = ? AND quantidade=?'); 
							$alert->bindValue(1,$nomeUs);
							$alert->bindValue(2,$res['quantidade']);
							$alert->execute();
							$a=$alert->fetch();
							$b=$a[0];
							$c=$a[1];

							if($b<=$c){
								echo "<a href='/php/cadprod/repor_Estoque_Manual.php'><img width='30px' height='30px' src='../img/alert.png'></a>"," necessita de reposição";
								}else{
									echo "<img width='30px' height='30px' src='../img/okay.png'>";
									} ?></td>
						<td><a href="/php/cadprod/repor_Estoque_Manual.php?ish=<?=$res['nome']?>">adicionar com link</a></td>
						</tr> 
					<?php endwhile; ?>
				</table>
				</div>
				</div>
				</div>
</body>
</html>
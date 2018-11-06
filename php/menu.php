<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<title></title>
</head> 
<body>
	<!-- LOGO DA PÁGINA -->
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 div1"><img src="/img/logos.png"></div>	
		</div>
		<!-- FIM LOGO DA PÁGINA -->	

		<!-- BOTÕES -->	
		<div class="row">
			<div class="col-lg-7 col-md-9 col-sm-12 col-xs-12 div2">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="btn btn-dark" href="/index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="btn btn-dark" href="/php/ajuda.php">Ajuda</a>
					</li>
					<li class="nav-item dropdown">
						<a class="btn btn-dark" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuário</a>
							<?php  
							if(isset($_SESSION['login'])){
								echo'<div class="dropdown-menu">
								<a class="dropdown-item" href="/php/login/logout.php">Logout</a>

							</div>';
						}else{
						echo
						'<div class="dropdown-menu">
							<a class="dropdown-item" href="/php/login/login.php">Login</a>
							<a class="dropdown-item" href="/php/login/register.php">Cadastro</a>';
						}
						?>
					</li>
					<li>
						<?php  
							if(isset($_SESSION['login'])){
								echo'<a class="btn btn-dark" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Produto</a>
								<div class="dropdown-menu">
								<a class="dropdown-item" href="/php/cadastro.php">Cadastro de Produto</a>
                <a class="dropdown-item" href="/php/exit.php">Saída de Produto</a>
							</div>';
						}
						?>
					</li>
					<li class="nav-item">
						<a class="btn btn-dark" href="/php/grupo.php">Quem Somos Nós</a>
					</li>
				</ul>

			<!--detalhe<nav>
					<button type="button" class="btn btn-dark">Home</button>
					<button type="button" class="btn btn-dark">Login</button>
					<button type="button" class="btn btn-dark">Sobre</button>
					<button type="button" class="btn btn-dark">Quem Somos Nós?</button>
					<button type="button" class="btn btn-dark">Ajuda</button>
				</nav> -->
			</div>
		</div>
		<!-- FIM DOS BOTÕES -->		
	</div>
</body> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	




<?php
session_start();
require_once '../index.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<fieldset>
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../img/boneco2.jpg" alt="First slide">
      <div class="legenda_carrossel_1">
       	<div class="carousel-caption d-none d-md-block">
    			<h4>Otimize sua produção e corte custos</h4>
    			<p></p>
    	</div>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/boneco.jpg" alt="Second slide">
            <div class="legenda_carrossel_1">
       	<div class="carousel-caption d-none d-md-block">
    			<h4>Administre Entradas e Saídas de Produtos</h4>
    			<p></p>
    	</div>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/boneco3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</fieldset>
</body>
</html>


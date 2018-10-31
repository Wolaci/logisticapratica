<?php

//session_start();



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="sortcut icon" href="/img/favicon.png" type="image/png" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/seman/Semantic-UI-CSS-master/semantic.min.css">
  <title>Logística Prática</title>
</head>
<body>
  <header class="cabecalho">
    <div class="container-fluid">
      <img src="../../img/logos.png">
      <ul class="nav nav-tabs">
        <li>
          <a class="btn btn-dark" href="/php/home.php" role="button">Home</a>
        </li>
        <li class="nav-item">
        </li>
        <a class="btn btn-dark" href="/php/sobre_novo.php" role="button">Sobre</a>
        <li class="nav-item">
        </li>

        <li class="nav-item">
        </li>
      </li>
      <a class="btn btn-dark" href="/php/ajuda.php" role="button">Ajuda</a>
      <li>
        <a class="btn btn-dark" href="/php/sobrenos.php" role="button">Quem somos nós?</a>
      </li>


      <li>
        <div class="btn-group">
          <a type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Usuário</a>
          <?php 

          
          if (!isset($_SESSION['login'])){
            
            
            echo '<div class="dropdown-menu">
            <a class="dropdown-item" href="/php/login/login.php">Login</a>
            <a class="dropdown-item" href="/php/login/register.php">Cadastro</a>
            <div class="dropdown-divider"></div>';
          }else{
            echo
            '<div class="dropdown-menu">
            <a class="dropdown-item" href="/php/login/logout.php">Logout</a>
            <div class="dropdown-divider"></div>';
          }

          ?>

        </div>
        <?php
        if (isset($_SESSION['login'])) {
          
            
          echo
          '<div class="btn-group">
          <a type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Produtos</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/php/cadastro.php">Cadastrar Produtos</a>
            <a class="dropdown-item" href="/php/exit.php">Saída de Produtos</a>
            <div class="dropdown-divider"></div>';
          }
          ?>

        </div>
      </li>


    </ul>
  </div>
</header>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
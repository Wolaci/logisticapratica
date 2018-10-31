<?php 

session_start();
require_once '../menu.php';

/*
if ($_SESSION['erro']) {
	echo "senhas erradas";
}*/

?>
<!DOCTYPE html>
<html>
<head>
  <style>
body {font-family: Arial, Helvetica, sans-serif;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>
<form method="POST" action="vercad.php">
  <div class="container">
    <label for="us"><b>Usuário</b></label>
    <input type="text" placeholder="Novo Nome" name="us" required>

    <label for="pw1"><b>Senha</b></label>
    <input type="password" placeholder="Nova Senha" name="pw1" required>

    <label for="pw2"><b>Confirmar Senha</b></label>
    <input type="password" placeholder="Confirmar Senha" name="pw2" required>

    <button type="submit">Cadastrar</button>
  </div>
  <?php
  if (isset($_SESSION['cadEx'])) {
    echo '<div class="container" style="text-align:center; border:2px solid #0f0;   background-color:rgba(0,255,0,0.3);">';
     if (isset($_SESSION['sucesso'])) {
       echo 'Cadastro Efetuado com Sucesso!';
     }
     echo '</div>';
   }
    if (isset($_SESSION['passErro'])) {
    echo '<div class="container" style="text-align:center; border:2px solid #FFA500;   background-color:rgba(255,165,0,0.7);">';
     if (isset($_SESSION['passInc'])) {
       echo 'Senhas Não Correspondem!';
     }
     echo '</div>';
   } 
   if (isset($_SESSION['user'])) {
    echo '<div class="container" style="text-align:center; border:2px solid #000;   background-color:rgba(128,128,128,0.5);">';
     if (isset($_SESSION['existe'])) {
       echo 'Usuário já existe!'.'<br>'.'Escolho outro nome de usuário!';
     }
     echo '</div>';
   } 
   ?>

  <div class="container" style="background-color:#f1f1f1">
    <a href="login.php"><button type="button" class="cancelbtn">Entrar</button></a>
    <button type="button" class="cancelbtn">Cancelar</button>
    <span class="psw">Esqueceu a <a href="#">senha?</a></span>
  </div>
</form>

<?php 

session_start();
require_once '../../index.php';

/*
if ($_SESSION['erro']) {
	echo "senhas erradas";
}*/

?>
<form method="POST" action="vercad.php">
  <div class="imgcontainer">
  </div>
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

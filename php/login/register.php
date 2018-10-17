<?php 

require_once '../../index.php';

session_start();
if ($_SESSION['erro']) {
	echo "senhas erradas";
}

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

  <div class="container" style="background-color:#f1f1f1">
    <a href="login.php"><button type="button" class="cancelbtn">Entrar</button></a>
    <button type="button" class="cancelbtn">Cancelar</button>
    <span class="psw">Esqueceu a <a href="#">senha?</a></span>
  </div>
</form>

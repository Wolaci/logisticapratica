<?php 
		require_once('../../index.php');
	
?>


<form method="POST" action="verlog.php">
  <div class="imgcontainer">
  </div>
  <div class="container">
    <label for="uname"><b>Usuário</b></label>
    <input type="text" placeholder="Inserir Usuário" name="login" required>

    <label for="psw"><b>Senha</b></label>
    <input type="password" placeholder="Inserir Senha" name="senha" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <a href="register.php"><button type="button" class="cancelbtn">Cadastrar-se</button></a>
    <button type="button" class="cancelbtn">Cancelar</button>
    <span class="psw">Esqueceu a <a href="#">senha?</a></span>
  </div>
</form>
</body>
</html>
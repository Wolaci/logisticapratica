<?php 

require_once 'index.php';
<?php
session_start();
if ($_SESSION['erro']) {
	echo "senhas erradas";
}

?>

<fieldset>
	<form action="vercad.php" method="POST">
<div class="box">
		<h2>Registro</h2>
		<form>
			<div class="inputbox">
				<input type="" name="" required="">
				<label>Usuário</label>
			</div>
			<div class="inputbox">
				<input type="password" name="" required="">
				<label>Senha</label>
			</div>
			<div class="inputbox">
				<input type="" name="" required="">
				<label>Confirme a senha</label>
			</div>
			<input type="submit" name="" value="Submit">
		</form>
	</div>
	</form>
</fieldset>

<?php
session_start();
if ($_SESSION['erro']) {
	echo "senhas erradas";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<form action="vercad.php" method="POST">
			<input type="text" name="us"placeholder="login">
			<input type="password" name="pw1" placeholder="senha">
			<input type="password" name="pw2" placeholder="confirmar senha">
			<input type="submit" value="cadastrar">
		</form>
		<a href="login.php"><button>logar</button></a>
	</center>
</body>
</html>
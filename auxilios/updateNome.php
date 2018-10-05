<?php
	include 'conexao.php';

	$id = $_GET['id'];

	$nomes=("SELECT * FROM nome WHERE id = $id");
	
	$result = $conn->query($nomes);
	
	$res = $result->fetch(PDO::FETCH_ASSOC);

				
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="GravaEdita.php" method="post">
		<input type="text" name="nome" value="<?= $res['nome'] ?>">
		<input type="hidden" name="id" value="<?= $id ?>">
		<input type="submit">
	</form>
</body>
</html>

	
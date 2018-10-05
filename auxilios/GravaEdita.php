<?php
	include 'conexao.php';


	$nome = $_POST['nome'];
	$id = $_POST['id'];

	$consulta = $conn->prepare("UPDATE nome SET nome = '$nome' WHERE id = '$id'");
	$consulta->bindParam(1,$nome);
	$consulta->execute();

	header('location:index.php');

?>

<?php
	include 'conexao.php';


	$nome = $_POST['nome'];


	$consulta = $conn->prepare("INSERT INTO nome(nome) VALUES (?)");
	$consulta->bindParam(1,$nome);
	$consulta->execute();

	header('location:index.php');

?>

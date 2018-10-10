<?php

	include 'conexao.php';

	$id = $_GET['id'];

	$apagar = $conn->prepare("DELETE FROM produto_pdo  WHERE id = $id");
	$apagar->execute();

	header('location:/php/cadastro.php');

?>

     
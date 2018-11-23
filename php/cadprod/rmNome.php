<?php

	//include 'conexao.php';
include '../POO/Usuario.php';
	$u = new Usuario();
	$u->conectar();
	
	$id = $_GET['id'];

	$apagar = $conn->prepare("DELETE FROM produto_pdo  WHERE id = $id");
	$apagar->execute();

	header('location:/php/cadastro.php');

?>

     
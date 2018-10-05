<?php

	include 'conexao.php';

	$id = $_GET['id'];

	$apagar = $conn->prepare("DELETE FROM nome WHERE id = $id");
	$apagar->execute();

	header('location:index.php');

?>

     
<?php
	session_start();
	include '../POO/Usuario.php';
	$u=new Usuario;
 	 $u->conectar();
	//include '../POO/Produto.php';

	//$nomeUser=$_SESSION['login'];
	$nome = $_POST['nome'];
	$cod = $_POST['cod'];
	$lot = $_POST['lot'];
	$val = $_POST['validade'];
	$id = $_POST['id'];
	$ce = $conn->prepare("UPDATE produto_pdo Set nome= ? ,codigo= ? ,lote= ? ,validade= ? WHERE id = ?");
	$ce->execute([$nome,$cod,$lot,$val,$id]);

	header('location:../listar.php');
?>
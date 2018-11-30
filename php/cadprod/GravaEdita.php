<?php
	session_start();
	include '../POO/Usuario.php';
	$u=new Usuario;
 	 $u->conectar();
	//include '../POO/Produto.php';

	//$nomeUser=$_SESSION['login'];
	$nome = $_POST['nome'];
	
	$id = $_POST['id'];
	$ce = $conn->prepare("UPDATE produto_pdo Set nome= ?  WHERE id = ?");
	$ce->execute([$nome,$id]);

	header('location:../listar.php');
?>
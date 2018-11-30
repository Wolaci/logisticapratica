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
	$che = $_POST['chegada'];
	$quant = $_POST['quantidade'];
	$id = $_POST['id'];
	$ce = $conn->prepare("UPDATE produto_pdo Set nome= ? ,codigo= ? ,lote= ? ,validade= ? ,chegada = ? ,quantidade = ? WHERE id = ?");
	$ce->execute([$nome,$cod,$lot,$val,$che,$quant,$id]);

	header('location:../listar.php');
?>
<?php
	include 'conexao.php';

	session_start();


	$nomeUs=$_SESSION['login'];
	$nome = $_POST['nome'];
	$codigo =$_POST['codigo'];
	$validade =$_POST['validade'];
	$chegada =$_POST['chegada'];
	$lote =$_POST['lote'];


	

	$consulta = $conn->prepare("INSERT INTO produto_pdo(nome,codigo,validade,chegada,lote,fk_user) VALUES (?,?,?,?,?,?)");
	$consulta->bindParam(1,$nome);
	$consulta->bindParam(2,$codigo);
	$consulta->bindParam(3,$validade);
	$consulta->bindParam(4,$chegada);
	$consulta->bindParam(5,$lote);
	$consulta->bindParam(6,$nomeUs);
	$consulta->execute();
;


	header('location:/php/cadastro.php');

?>

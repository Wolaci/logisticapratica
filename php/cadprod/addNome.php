<?php
	//include 'conexao.php';
  include '../POO/Usuario.php'; 
  $u=new Usuario;
  $u->conectar();
	session_start();


	$nomeUs=$_SESSION['login'];
	$nome = $_POST['nome'];
	$codigo =$_POST['codigo'];
	$validade =$_POST['validade'];
	$chegada =$_POST['chegada'];
	$lote =$_POST['lote'];
	$quant=$_POST['quant'];


	

	$consulta = $conn->prepare("INSERT INTO produto_pdo(nome,codigo,validade,chegada,lote,fk_user,quantidade) VALUES (?,?,?,?,?,?,?)");
	$consulta->bindParam(1,$nome);
	$consulta->bindParam(2,$codigo);
	$consulta->bindParam(3,$validade);
	$consulta->bindParam(4,$chegada);
	$consulta->bindParam(5,$lote);
	$consulta->bindParam(6,$nomeUs);
	$consulta->bindParam(7,$quant);
	$consulta->execute();



	header('location:/php/cadastro.php');

?>

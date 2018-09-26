<?php
	include 'conexao.php';


	$nome = $_POST['nome'];
	$codigo =$_POST['codigo'];
	$validade =$_POST['validade'];
	$chegada =$_POST['chegada'];
	$lote =$_POST['lote'];


	

	$consulta = $conn->prepare("INSERT INTO produto_pdo(nome,codigo,validade,chegada,lote) VALUES (?,?,?,?,?)");
	$consulta->bindParam(1,$nome);
	$consulta->bindParam(2,$codigo);
	$consulta->bindParam(3,$validade);
	$consulta->bindParam(4,$chegada);
	$consulta->bindParam(5,$lote);
	$consulta->execute();
;


	header('location:cadastro.php');

?>

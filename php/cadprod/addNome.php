<?php
	//include 'conexao.php';
	session_start();
  include '../POO/Usuario.php'; 
  $u=new Usuario;
  $u->conectar();


	$nomeUs=$_SESSION['login'];
	$nome = $_POST['nome'];
	$codigo =$_POST['codigo'];
	$validade =$_POST['validade'];
	$chegada =$_POST['chegada'];
	$lote =$_POST['lote'];
	$quant=$_POST['quant'];


  include '../POO/Produto.php';
  $p=new Produto;
  $p->cadastroDeProdutos($nomeUs, $nome, $codigo, $validade, $chegada, $lote, $quant);

	
	header('location:/php/cadastro.php');



?>

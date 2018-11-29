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
	$estoque=$_POST['estoque'];
	//$mail_forn=$_POST['mail_forn'];


  include '../POO/Produto.php';
  $p=new Produto;
  $p->cadastroDeProdutos($nomeUs, $nome, $codigo, $validade, $chegada, $lote, $quant, $estoque);

	
	header('location:/php/cadastro.php');



?>

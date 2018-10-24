<?php
include 'conexao.php';
session_start();
$code= $_POST['code'];
$quant=$_POST['quantities'];
$log=$_SESSION['login'];



$vender = $conn->prepare("SELECT nome,quantidade FROM produto_pdo  WHERE codigo = ?");
$vender->execute([$code]); 
$adc=$vender->fetch();
$soma=$adc[1]-$quant;

$adicionar=$conn->prepare('UPDATE produto_pdo SET quantidade = ? WHERE codigo = ?  ');
$adicionar->execute([$soma,$code]);

$saidaE= $conn->prepare('INSERT INTO saida(nome,quantidade,login) VALUES (?,?,?) ');
$saidaE->execute([$adc[0],$quant,$log]);



header('location:/php/exit.php');

?>
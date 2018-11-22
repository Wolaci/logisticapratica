<?php

include '../POO/Usuario.php';
$u = new Usuario();
$u->conectar();	
$code= $_POST['code'];
$quant=$_POST['quantities'];



global $conn;

$vender = $conn->prepare("SELECT nome,quantidade FROM produto_pdo  WHERE codigo = ?");
$vender->execute([$code]); 
$adc=$vender->fetch();
$soma=$adc[1]-$quant;

$adicionar=$conn->prepare('UPDATE produto_pdo SET quantidade = ? WHERE codigo = ?  ');
$adicionar->execute([$soma,$code]);

$saidaE= $conn->prepare('INSERT INTO saida(nome,quantidade,login) VALUES (?,?,?) ');
$saidaE->execute([$adc[0],$quant,$_SESSION['login']]);



header('location:/php/exit.php');

?>
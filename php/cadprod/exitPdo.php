<?php

include '../POO/Usuario.php';
$log=$_SESSION['login'];
$code= $_POST['code'];
$quant=$_POST['quantities'];

$u = new Usuario();
$u->conectar();	

include '../POO/Produto.php';

$p = new Produto();
$p->saida($code,$quant);


// global $conn;

// $vender = $conn->prepare("SELECT nome,quantidade FROM produto_pdo  WHERE codigo = ?");
// $vender->execute([$code]); 
// $adc=$vender->fetch();
// $soma=$adc[1]-$quant;

// $adicionar=$conn->prepare('UPDATE produto_pdo SET quantidade = ? WHERE codigo = ?  ');
// $adicionar->execute([$soma,$code]);

// $saidaE= $conn->prepare('INSERT INTO Saida(nome,quantidade,login) VALUES (?,?,?) ');
// $saidaE->execute([$adc[0],$quant,$_SESSION['login']]);



header('location:/php/exit.php');

?>
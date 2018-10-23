<?php
include 'conexao.php';
session_start();
$code= $_POST['code'];
$quant=$_POST['quantities'];



$vender = $conn->prepare("SELECT quantidade FROM produto_pdo  WHERE codigo = ?");
$vender->execute([$code]); 
$adc=$vender->fetch();
$soma=$adc[0]-$quant;

$adicionar=$conn->prepare('UPDATE produto_pdo SET quantidade = ? WHERE codigo = ?  ');
$adicionar->execute([$soma,$code]);


header('location:/php/exit.php');

?>
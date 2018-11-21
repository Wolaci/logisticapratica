<?php
include '../POO/Usuario.php';
include '../POO/Produto.php';

$prod = $_POST['prod'];
$prodcod=$_POST['prod_cod'];
$comp=$_POST['comp'];
$compcod=$_POST['comp_cod'];
$quantcomp=$_POST['quant_comp'];

$u = new Usuario();
$u -> conectar();

$p = new Produto();
$p->returnIdProd($prod,$prodcod,$comp,$compcod,$quantcomp);

header('location: /php/compoe.php')
?>
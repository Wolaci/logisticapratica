<?php
session_start();

include '../POO/Usuario.php';
include '../POO/Produto.php';

// $prod = $_POST['prod'];
// $prodcod=$_POST['prod_cod'];
// $comp=$_POST['comp'];
// $compcod=$_POST['comp_cod'];
// $quantcomp=$_POST['quant_comp'];
$id_prod=$_POST['prod'];
$id_comp=$_POST['comp'];
$quantcomp=$_POST['quant'];
$log = $_SESSION['login'];

$u = new Usuario();
$u -> conectar();

$p = new Produto();
$p->returnIdProd($id_prod,$id_comp,$quantcomp,$log);

header('location: /php/compoe.php')
?>
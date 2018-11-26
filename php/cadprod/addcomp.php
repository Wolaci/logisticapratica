<?php
include '../POO/Usuario.php';
include '../POO/Produto.php';

// $prod = $_POST['prod'];
// $prodcod=$_POST['prod_cod'];
// $comp=$_POST['comp'];
// $compcod=$_POST['comp_cod'];
// $quantcomp=$_POST['quant_comp'];
$quantcomp=$_POST['quant'];
$id_prod=$_POST['prod'];
$id_comp=$_POST['comp'];


$u = new Usuario();
$u -> conectar();

$p = new Produto();
$p->returnIdProd($id_prod,$id_comp,$quantcomp);

header('location: /php/compoe.php')
?>
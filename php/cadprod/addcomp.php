<?php

session_start();

include '../POO/Usuario.php';
include '../POO/Produto.php';


$id_prod=$_POST['prod'];
$id_comp=$_POST['comp'];
$quantcomp=$_POST['quant'];
$log = $_SESSION['login'];


$u = new Usuario();
$u -> conectar();

$p = new Produto();
$ver=$conn->prepare('SELECT * FROM compoe WHERE id_produto =? AND id_componente =? ');
$ver->execute([$id_prod,$id_comp]);
if ($ver->rowCount()>0) {
	
	$_SESSION['ver_c']= true;
}else{
$p->returnIdProd($id_prod,$id_comp,$quantcomp,$log);
}




header('location: /php/compoe.php')
?>
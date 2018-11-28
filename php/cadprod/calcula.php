<?php 
session_start();
include '../POO/Usuario.php';
$u = new Usuario();
$u->conectar();

$_SESSION['calc'] = $_POST['selProd'];
$_SESSION['mul'] = $_POST['quantProdt']; 



//$ver_prod=$conn->prepare('SELECT quantidade,id_componente,id_produto WHERE ');

header('location: /php/calcprod.php')

?>
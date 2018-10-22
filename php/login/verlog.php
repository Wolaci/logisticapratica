<?php
$us=$_POST['login'];
$pw=$_POST['senha'];

include '../POO/Usuario.php';
$u= new Usuario;
$u -> conectar();
$u -> logar($us,$pw);

?>
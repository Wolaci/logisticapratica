<?php
include '../POO/Usuario.php';
$u = new Usuario();
$u->conectar();
$em=$_POST['email'];


$_em=$conn->prepare('INSERT INTO mail(email) VALUES (?)');
$_em->execute([$em]);
header('location: /php/cadmail.php');


?>
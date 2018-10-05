<?php
session_start();
include 'conUser.php';
$user = $_POST['us'];
$pw1 = $_POST['pw1']; 
$pw2 = $_POST['pw2'];
$nick = $_POST['apelido'];
if (!($pw1==$pw2)) {
 	header('location: cad.php');
 } else {
 	$consulta = $con->prepare("INSERT INTO usuario(user,senha,apelido) VALUES (?,?,?)");
           $consulta->bindParam(1,$user);
           $consulta->bindParam(2,$pw1);
           $consulta->bindParam(3,$nick);
           $consulta->execute();
           header('location: login.php');
 }
 

?>
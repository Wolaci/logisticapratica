<?php
$usuario=$_POST['login'];
$pw=$_POST['senha'];

include '../cadprod/conexao.php';

echo $usuario;
echo $pw;

$stmt = $conn->prepare("SELECT * FROM usuario WHERE user = ? AND senha = ?"); 
$stmt->bindParam(1,$usuario); 
$stmt->bindParam(2, $pw); 

 
//Executando statement 
$stmt->execute(); 

// Obter linha consultada 
$obj = $stmt->fetchObject(); 

// Se a linha existe: indicar que esta logado e encaminhar para outro lugar 

//var_dump($obj);
if($obj){

session_start();
$_SESSION['login'] = $_POST['login']; 
header('Location: /php/homeuser.php'); 
} else { 
header('Location: login.php'); 
} 




?>
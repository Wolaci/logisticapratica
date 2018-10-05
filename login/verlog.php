<?php
session_start();
$user=$_POST['login'];
$pass=$_POST['senha'];
require_once("conexao.php");
$stmt = $con->prepare("SELECT * FROM usuario WHERE user = ? AND senha = ?"); 
$stmt->bindParam(1,$user); 
$stmt->bindParam(2, $pass); 

// Executando statement 
$stmt->execute(); 

// Obter linha consultada 
$obj = $stmt->fetchObject(); 

// Se a linha existe: indicar que esta logado e encaminhar para outro lugar 
if ($obj) { 
$_SESSION['login'] = $_POST['login']; 
header('Location: home.php'); 
} else { 
header('Location: login.php'); 
} 




?>
<?php
session_start();
$user=$_POST['us'];

require_once("../cadprod/conexao.php");
$stmt = $conn->prepare("SELECT * FROM usuario WHERE user = ?"); 
$stmt->bindParam(1,$user); 


// Executando statement 
$stmt->execute(); 

// Obter linha consultada 
$obj = $stmt->fetchObject(); 

// Se a linha existe: indicar que esta logado e encaminhar para outro lugar 
if ($obj) { 
//$_SESSION['login'] = $_POST['login']; 
echo "escolha outro nick"; 
} else { 
//header('Location: login.php'); 







//session_start();
//include '../cadprod/conexao.php';
$user = $_POST['us'];
$pw1 = $_POST['pw1']; 
$pw2 = $_POST['pw2'];







if ($pw1!=$pw2) {
	session_start();
 	header('location: /php/login/cad.php');
 	$_SESSION['erro']=true;
 } else {
 	$consulta = $conn->prepare("INSERT INTO usuario(user,senha) VALUES (?,?)");
           $consulta->bindParam(1,$user);
           $consulta->bindParam(2,$pw1);
           //$consulta->bindParam(3,$nick);
           $consulta->execute();
           header('location: /php/cadastro.php');
           
 }
 }

?>


<?php
session_start();
include '../POO/Usuario.php';
$log=$_SESSION['login'];
$code= $_POST['code'];
$quant=$_POST['quantities'];

if($code){

$u = new Usuario();
$u->conectar();	

include '../POO/Produto.php';

$p = new Produto();
$p->saida($code,$quant,$log);
}

// $stmt=$conn->prepare('SELECT quantidade,estoque,mail_forn FROM produto_pdo WHERE fk_user=? and codigo=?');
// $stmt->execute([$log,$code]);

// $test=$stmt->fetch();
// var_dump($test);
// if ($test[0]<=$test[1]) {
// 	$envio=$conn->prepare('SELECT mail.email FROM mail JOIN produto_pdo ON id_mail=?');
// 	$envio->execute([$test[2]]);
// 	$env=$envio->fetch();
	
// 	$_SESSION['envio']=$env[0];
// 	header('location: /php/mail/Mail/email.php');
// }


// global $conn;

// $vender = $conn->prepare("SELECT nome,quantidade FROM produto_pdo  WHERE codigo = ?");
// $vender->execute([$code]); 
// $adc=$vender->fetch();
// $soma=$adc[1]-$quant;

// $adicionar=$conn->prepare('UPDATE produto_pdo SET quantidade = ? WHERE codigo = ?  ');
// $adicionar->execute([$soma,$code]);

// $saidaE= $conn->prepare('INSERT INTO Saida(nome,quantidade,login) VALUES (?,?,?) ');
// $saidaE->execute([$adc[0],$quant,$_SESSION['login']]);



header('location:/php/exit.php');

?>
<?php

/**
 * 
 */
class Usuario
{
	//session_start();
	public $conn;
	function conectar()
	{
		global $conn;
		try {
			$conn = new PDO("mysql:host=localhost;dbname=id7218638_logistica", 'root','ifpe');
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
	function logar($user,$pass)
	{
		global $conn;
		session_start();
		$stmt = $conn->prepare("SELECT * FROM usuario WHERE user = ? AND senha = ?");
		
		$stmt->execute([$user,$pass]);

		if($stmt->rowCount()>0){
			$_SESSION['login'] = $_POST['login']; 
			header('Location: /php/cadastro.php');
		}else{
			$_SESSION['logErro']=true;
			$_SESSION['erro']=true;
			header('location: /php/login/login.php');
		}
	}
	function cadastrar($user,$pass,$pass2){
		global $conn;
		$stmt = $conn->prepare("SELECT * FROM usuario WHERE user = ?");
		$stmt->execute([$user]);

			session_destroy();
			session_start();
		if(!($stmt->rowCount()>0)){
			session_destroy();
			session_start();
		if($pass!=$pass2){
			session_destroy();
			session_start();
			$_SESSION['passErro'] = true;
			$_SESSION['passInc'] = true;
			header('location: /php/login/register.php');
		}else{
			$stmt = $conn->prepare('INSERT INTO usuario(user,senha) VALUES (?,?)');
			
			$stmt->execute([$user,$pass]);
		  //session_start();
			$_SESSION['cadEx'] = true;
			$_SESSION['sucesso'] = true;
			header('location: /php/login/register.php');
		}
	}else{	
		$_SESSION['user']=true;
		$_SESSION['existe']=true;
		header('location: register.php');
	}

	}
	// function verExisteUser($user){
	// 	global $conn;
	// 	exit();
	// 	}
		function logOut(){
			header('location: login.php');
		}

	}



?>
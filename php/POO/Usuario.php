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
			$conn = new PDO("mysql:host=localhost;dbname=id7218638_logistica", 'id7218638_root','logistica');
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
	function logar($user,$pass)
	{
		global $conn;
		$stmt = $conn->prepare("SELECT * FROM usuario WHERE user = ? AND senha = ?");
		$stmt->execute([$user,$pass]);

		if($stmt->rowCount()>0){
			session_start();
			$_SESSION['login'] = $_POST['login']; 
			//header('Location: /php/homeuser.php');
			echo 'lerol000ero';
		}else{
			echo 'opa';
		}
	}
	function cadastrar($user,$pass,$pass2){
		global $conn;
     if($pass!=$pass2){
         echo 'oi';
     }else{
         $stmt = $conn->prepare('INSERT INTO (user,senha) VALUES (?,?)');
         $stmt->execute([$user,$pass]);
     }
     
	}
	function verExisteUser($user){
	    global $conn;
		$stmt = $conn->prepare("SELECT * FROM usuario WHERE user = ?");
		$stmt->execute([$user]);

		if ($stmt->rowCount()>0) {
		//	$_SESSION['existe'];
			//return false;
			echo 'oi';
		}else{
         echo "tchau";
		}
		function logOut(){
			header('location: login.php');
		}

	}
}


?>
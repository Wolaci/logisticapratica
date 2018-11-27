<?php
	session_start();

	include '../POO/Usuario.php';
	$u=new Usuario;
 	 $u->conectar();
	//include '../POO/Produto.php';

/*try {
			$conn = new PDO("mysql:host=localhost;dbname=id7218638_logistica", 'root','junior150305');
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	*/
	$nomeUser=$_SESSION['login'];
	$nome = $_POST['nome'];
	$codigo = $_POST['codigo'];
	$validade = $_POST['validade'];
	$chegada = $_POST['chegada'];
	$lote =$_POST['lote'];
	$id = $_POST['id'];

	$ce = $conn->prepare("UPDATE produto_pdo Set nome='?' codigo= '?' validade='?' chegada='?' lote= '?' WHERE id = ? and fk_user = $nomeUser");

	$ce->execute([$validade,$chegada,$lote,$nome,$codigo,$id]);
	

	header('location:../cadastro.php');

?>

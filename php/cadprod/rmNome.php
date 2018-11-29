<?php


include '../POO/Usuario.php';
$u = new Usuario();
$u->conectar();

$id = $_GET['id'];

$apagar = $conn->prepare("DELETE FROM produto_pdo  WHERE id = ? ");
$apagar->execute([$id]);

header('location:/php/cadastro.php');

?>


<?php

include '../POO/Usuario.php';

$quantidade = $_POST['quantidade'];
$nome = $_POST['prodt'];

$u = new Usuario();
$u->conectar();

$fazConta = $conn->prepare('SELECT quantidade FROM produto_pdo WHERE nome =? ');
$fazConta->execute([$nome]);
$result = $fazConta;
$res = $result + $quantidade;

$adc = $conn->prepare('UPDATE produto_pdo SET quantidade = ? where nome = ?');
$adc->execute([$res,$nome]);

header('location:../listar.php');


?>
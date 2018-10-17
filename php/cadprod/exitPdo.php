<?php
include 'conexao.php';

$code= $_POST['code'];
/*$minicode= $conn->prepare("SELECT * FROM produto_pdo WHERE codigo= $code");
if($minicode->rowCount()>0){
$apagar2 = $conn->prepare("DELETE FROM produto_pdo  WHERE codigo = ?");
$apagar2->execute([$code]);

header('location:/php/exit.php');

}*/


$apagar2 = $conn->prepare("DELETE FROM produto_pdo  WHERE codigo = ?");
$apagar2->execute([$code]);

header('location:/php/exit.php');

?>
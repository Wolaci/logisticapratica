<?php 

include '../POO/Usuario.php';
$u = new Usuario();
$u->conectar();

$selProd = $_POST['selProd'];

$selec=$conn->prepare('SELECT * FROM produto_pdo WHERE  nome=?');
$selec->execute([$selProd]);
var_dump($selec);

if($selec){
	//echo "oi";
$select=$conn->prepare('SELECT nome,quantidade FROM produto_pdo WHERE  id=?');
$select->execute([$selProd]);
$a = $select->fetchALL();
//echo $a[0];
var_dump($a);
}

?>
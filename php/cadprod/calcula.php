<?php 

include '../POO/Usuario.php';
$u = new Usuario();
$u->conectar();

$selProd = $_POST['selProd'];
$quantProdt = $_POST['quantProdt']; 


$selec=$conn->prepare('SELECT * FROM produto_pdo WHERE  id=?');
$selec->execute([$selProd]);
//var_dump($selec);

if($selec){
	//echo "oi";
$select=$conn->prepare('SELECT quantidade FROM produto_pdo WHERE  id=?');
$select->execute([$selProd]);
$a = $select;
//echo $a[0];
//3echo $a[1];
if($a->rowcount()>0){
	$a->fetch();
if($quantProdt<= $a){
	echo "isso ae,Hello World";
}
}else{
	echo "nao foi,hello World";
}
//var_dump($a);
}


?>
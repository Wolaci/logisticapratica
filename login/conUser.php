<?php
try{
$con = new PDO('mysql:root=localhost;dbname=id7218638_logistica','id7218638_root','logistica');
}
catch(PDOException $e){
    return $e->getMessage();
}
?>
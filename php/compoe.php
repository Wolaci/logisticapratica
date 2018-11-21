<?php
session_start();
require 'menu.php';
include 'POO/Usuario.php';
$u = new Usuario();
$u -> conectar();

?>
<!DOCTYPE html>
<html>
<head>
<style>
	body {color:white; font-family: Arial, Helvetica, sans-serif;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
    h1{}
}
</style>
	<title></title>
</head>
<body>
<title></title>
</head>
<body>
	<form action="/php/cadprod/addcomp.php" method="POST" >
	<div class="container">
	<h1>Produtos</h1>
	<input type="text" name="prod" required placeholder="digite o nome o do produto">
	<input type="text" name="prod_cod" required placeholder="digite o codigo do produto">
	<h1>Componentes</h1>
	<input type="text" name="comp" placeholder="digite o nome do componente ">
	<input type="text" name="comp_cod" placeholder="digite o nome do componente">
    <input type="text" name="quant_comp" placeholder="escolha a quantidade de componentes">
	<button class="submit">enviar</button>
    
	</div>
	</form>
</body>
</html>
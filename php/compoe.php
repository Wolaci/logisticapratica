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
<style tbody {font-family: Arial, Helvetica, sans-serif;}

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
}ype="text/css">
	body {font-family: Arial, Helvetica, sans-serif;}

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
    #comp{
    	width: 200px;
    	height: 200px;
    	background-color: white;
    }
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
	<h1>produto</h1>
	<input type="text" name="prod" placeholder="digite o nome do produto" required>
	<input type="text" name="prod_cod" placeholder="digite o  do componente" required>
	<h1>componente</h1>
	<input type="text" placeholder="digite o nome do componente" name="comp">
	<input type="text" name="comp_cod" placeholder="digite o codigo do componente" required> 
	<button type="submit">enviar</button>
	<div id="comp">ver os componentes</div>
	</div>
	</form>
</body>
</html>
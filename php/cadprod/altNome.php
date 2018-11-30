<?php
session_start();
require '../menu.php';
include '../POO/Usuario.php';
$u = new Usuario();
$u -> conectar();
$nameUs=$_SESSION['login'];
    $id = $_GET['serio'];
    /*include 'conexao.php';
    $nomes=("SELECT * FROM nome WHERE id = $id");
    
    $result = $conn->query($nomes);
    
    $res = $result->fetch(PDO::FETCH_ASSOC);
    */          
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style type="text/css">
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
   </style>4
    </style>
</head>
<body>
<div class="container">
<fieldset>
    <form action="GravaEdita.php" method="post">
        <input class="form-group" type="text" name="nome"  placeholder="Produto">
        <input  class="form-group" type="text" name="cod" placeholder="codigo">
        <input type="date" name="validade">
        <input type="date" name="chegada">
        <input  class="form-group" type="text" name="lot" placeholder="lote">
        <input class ="form-group" type="number" name="quantidade" placeholder="quantidade">
         <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit">alterar</button>
    </form>
    </fieldset>
</div>
</body>
</html>
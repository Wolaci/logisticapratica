<?php
session_start();
if(isset($_SESSION['login'])){

include '../POO/Usuario.php';
$u = new Usuario();
$u -> conectar();
$nameUs=$_SESSION['login'];
require '../menu.php';

}else{
	header('location:cadastro.php');
}
$get = $_GET['ish'];
//$nome = $conn->prepare('SELECT nome FROM produto_pdo WHERE id= ?');
//$nome->execute([$get]);
$hj = $_GET['hj'];

$_comp=$conn->prepare('SELECT id,nome FROM produto_pdo WHERE fk_user=?');
$_comp->execute([$nameUs]);
$show=$_comp->fetchALL(PDO::FETCH_ASSOC);       
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
   </style>
    </style>
    </head>
    <body>
    <div class="container">
    
    <fieldset>
	
	<form method="POST" action="adicionar.php" >
	<!--h1>confirme o Produto<select name="prod" class="form-control" id="exampleSelect1">
                <?php foreach ($show as $see ) :?>
                    <option   value="<?=$see['id']?>"><?=$see['nome']?></option>
                <?php endforeach ; ?> 
    </select></h1>-->
    <h1>Produto<input type="text" name="prodt" value=<?=$get?>></h1>
	
	<h1>adicione quantidade <input class="form-control" type="number" name="quantidade" placeholder="Digite uma Quantidade" min="1" ></h1>	
	
	<button type="submit">adicionar</button>
	</form>
    
    
    </fieldset>
    </div>
   
</body>
</html>
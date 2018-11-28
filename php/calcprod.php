<?php
session_start();
require 'menu.php';
include 'POO/Usuario.php';
$u = new Usuario();
$u -> conectar();
$nameUs=$_SESSION['login'];

$seletaPro=$conn->prepare('SELECT id,nome FROM produto_pdo WHERE fk_user=?');
$seletaPro->execute([$nameUs]);
$show=$seletaPro->fetchALL(PDO::FETCH_ASSOC);

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
<h1>Calcular Produção</h1>
	<fieldset>
		<form class="form-group" method="POST" action="cadprod/calcula.php">
			<select name="selProd" class="form-control" id="exampleSelect1" >
				<?php foreach ($show as $see ) :?>
                    <option   value="<?=$see['id']?>"><?=$see['nome']?></option>
                <?php endforeach ; ?> 
			</select>
			<br>
			<input class="form-control" type="number" name="quantProdt" placeholder="Digite a quantidade do produto a ser calculada">
	<button type="submit" >Calcular</button>
		</form>
	</fieldset>
    <div>
        <table class="ui inverted table" style="text-align:center;">
             <h2>produto</h2> 
            <tr>
                <td>componentes</td>
                <td>quantidade</td>
                <td>situação do seu estoque atual</td>
            </tr>
            <?php
            $ver_prod=$conn->prepare('SELECT id_componente,quantidade
             FROM compoe WHERE  id_produto = ?');
            $ver_prod->execute([$_SESSION['calc']]); 
            $a=$ver_prod->fetchALL(PDO::FETCH_ASSOC);
            $b=$ver_prod->fetchALL();
            

            ?>
            <?php foreach ($a as $see ) : ?>
                <tr>
            <td><?=$see['id_componente']?></td>
            <td><?=$see['quantidade']*$_SESSION[mul]?></td>
            <td></td>
            </tr>
            <?php endforeach ;?>
        </table>
    </div>
    </div>
</body>
</html>
<?php
session_start();
require 'menu.php';
include 'POO/Usuario.php';
$u = new Usuario();
$u -> conectar();
$nameUs=$_SESSION['login'];

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

    <div class="container">
   <div><button id='produto'>ver seus produtos</button> 
        <div>
              <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">    
                <h2>Estoque</h2>
                <table border="1" cellpadding="5" cellspacing="0">
                    <tr>
                        <th>Nome</th>
                        <th>Componente</th>
                        <th>Quantidade</th>
                        
                    </tr>
                    <?php 



                    $nomes=$conn->prepare('SELECT * FROM produto_pdo WHERE fk_user = :f');
                    $nomes->bindValue(":f",$_SESSION['login']);
                    $nomes->execute();
        // $res = $nomes->fetch(PDO::FETCH_ASSOC);


                    while($res = $nomes->fetch(PDO::FETCH_ASSOC)):  


                        ?>
                        <tr>
                            <td><?= $res['nome'] ?></td>
                            <td><?=$res['codigo'] ?></td>
                            <td><?=$res['validade']?></td>
                            <td><?=$res['chegada']?></td>
                            <td><?=$res['lote']?></td>
                            <td><?=$res['quantidade']?></td>
                            <td><a href="/php/cadprod/rmNome.php?id=<?= $res['id'] ?>"><img src="../img/excluir.png"></excluir></a></td>
                            <td><?php 
                            //$alert=$conn->prepare('SELECT quantidade FROM produto_pdo WHERE fk_user = :f AND nome="$res[nome]" AND quantidade="0"');
                            $alert=$conn->prepare('SELECT quantidade FROM produto_pdo WHERE fk_user = ? AND quantidade=?'); 
                            $alert->bindValue(1,$_SESSION['login']);
                            $alert->bindValue(2,$res['quantidade']);
                            $alert->execute();
                            $a=$alert->fetch();
                            $b=$a[0];
                            

                            if($b<=0){
                                echo "<img width='30px' height='30px' src='../img/alert.png'>";
                            }else{
                                echo "<img width='30px' height='30px' src='../img/okay.png'>";
                            } ?></td>
                        </tr> 
                    <?php endwhile; ?>
                </table>
        </div>
        <div id="pjt" class="d-none">
            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">    
                <h2>Estoque</h2>
                <table border="1" cellpadding="5" cellspacing="0">
                    <tr>
                        <th>Nome</th>
                        <th>Código</th>
                        <th>Validade</th>
                        <th>Chegada</th>
                        <th>Lote</th>
                        <th>Quantidade</th>
                        <th>Excluir</th>
                    </tr>
                    <?php 



                    $nomes=$conn->prepare('SELECT * FROM produto_pdo WHERE fk_user = :f');
                    $nomes->bindValue(":f",$_SESSION['login']);
                    $nomes->execute();
        // $res = $nomes->fetch(PDO::FETCH_ASSOC);


                    while($res = $nomes->fetch(PDO::FETCH_ASSOC)):  


                        ?>
                        <tr>
                            <td><?= $res['nome'] ?></td>
                            <td><?=$res['codigo'] ?></td>
                            <td><?=$res['validade']?></td>
                            <td><?=$res['chegada']?></td>
                            <td><?=$res['lote']?></td>
                            <td><?=$res['quantidade']?></td>
                            <td><a href="/php/cadprod/rmNome.php?id=<?= $res['id'] ?>"><img src="../img/excluir.png"></excluir></a></td>
                            <td><?php 
                            //$alert=$conn->prepare('SELECT quantidade FROM produto_pdo WHERE fk_user = :f AND nome="$res[nome]" AND quantidade="0"');
                            $alert=$conn->prepare('SELECT quantidade FROM produto_pdo WHERE fk_user = ? AND quantidade=?'); 
                            $alert->bindValue(1,$_SESSION['login']);
                            $alert->bindValue(2,$res['quantidade']);
                            $alert->execute();
                            $a=$alert->fetch();
                            $b=$a[0];
                            

                            if($b<=0){
                                echo "<img width='30px' height='30px' src='../img/alert.png'>";
                            }else{
                                echo "<img width='30px' height='30px' src='../img/okay.png'>";
                            } ?></td>
                        </tr> 
                    <?php endwhile; ?>
                </table>
            </div>
        </div></div>
        <script type="text/javascript">
            var bol = true;
            var prod = document.getElementById('produto');
            var s = document.getElementById('show');
            var p = document.getElementById('pjt');
            prod.onclick= function () {
                if (bol) {

                    p.className = "";
                    prod.innerHTML= "desver seus produtos";
                    bol = false;
                }else{
                    p.className="d-none";
                    bol = true;
                    prod.innerHTML= "ver seus produtos";
                }
            }
        </script> 
    </body>
    </html>
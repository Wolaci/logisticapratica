<?php
session_start();
require 'menu.php';
include 'POO/Usuario.php';
$u = new Usuario();
$u -> conectar();
$nameUs=$_SESSION['login'];


$_comp=$conn->prepare('SELECT id,nome FROM produto_pdo WHERE fk_user=?');
$_comp->execute([$nameUs]);
$show=$_comp->fetchALL(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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

    </style>
    <div class="container">
        <form class="form-group" method="POST" action="cadprod/addcomp.php">
            <h1 style="color: white; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Produtos</h1>
            <p>Escolha o nome do seu produto</p>
            <select name="prod" class="form-control" id="exampleSelect1">
                <?php foreach ($show as $see ) :?>
                    <option   value="<?=$see['id']?>"><?=$see['nome']?></option>
                <?php endforeach ; ?> 
            </select>
            <?php if (isset($_SESSION[ver_c])) :?>
                <?='<div class="container" style="text-align:center; border:2px solid #f00;   background-color:rgba(255,0,0,0.6);">' ?>
                <?= 'componente já cadastrado a e esse produto' ?> 
                <?='</div>' ?> 
            <?php endif;?> 

            <h1 style="color: white; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Componentes</h1>
            <p>Escolha seu componente</p>
            <select name="comp"      class="form-control" id="exampleSelect1">
             <?php foreach ($show as $see ) :?>
                <option  value="<?=$see['id']?>"><?=$see['nome']?></option>
            <?php endforeach ; ?> 
        </select>
    </br>
    <p>Escolha a quantidade de componentes</p>
    <input class="form-control" type="number" placeholder="Ex:10" name="quant" min="1" >
    <button type="submit">Compor Produtos</button>
</form>
<div>
    <div >

        <h1 style="color: white; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Componentes do Produto</h1>
        <table class="ui inverted table" style="text-align:center;">
            <tr>
                <td>Produto</td>
                <td>Componente</td>
                <td>Quantidade</td>
            </tr>
            <?php
            $_comp=$conn->prepare('SELECT * FROM compoe WHERE user_comp = ?');
            $_comp->execute([$nameUs]);
            while ($comprod=$_comp->fetch(PDO::FETCH_ASSOC)) : ?>

            <tr>
                <td><?=$comprod['id_produto']?></td>
                <td><?=$comprod['id_componente']?></td>
                <td><?=$comprod['quantidade']?></td>
            </tr>

        <?php endwhile;  ?>
    </table>

</div>
</div>

<div id="pjt" class="d-none">
    <div >    
        <h2>Estoque</h2>
        <table border="1" cellpadding="5" cellspacing="0" class="ui inverted table" style="text-align:center;">
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


    var comp = document.getElementById('exampleSelect1');
    var mult =document.getElementById('mult');


</script> 
</body>
</html>
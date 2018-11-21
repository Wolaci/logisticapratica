<?php
session_start();
require_once '../php/menu.php';

?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


	<style type="text/css">
   .t1 {
    background-color: #ffff;
    box-shadow: 1px 1px 15px;
    margin-top: 25px;
    padding: 15px;
   } 
   .t1:hover{
    box-shadow: 2px 2px 20px;
   }
  </style>

<div class="container">
		<div class="t1">
		<h1> Cadastro de Produtos</h1>
		<p>Para realizar o cadastro de produtos é necessário fazer login com seu nome de usuário e senha, após fazer isso você deve preencher os campos requisitados que são: o nome do produto, código do produto, validade do produto, data de chegada do produto e o cadastro do lote do produto.</p>
		<h1>Venda de Produtos</h1>
		<p>Para realizar a venda de produtos você deve clicar no botão "Produto", após isso você vai clicar em "Saída de produtos" assim você será redirecionado para uma página onde você deve preencher o que é pedido para assim vender o seu produto.</p>
		<h1> Login</h1>
		<p>Para fazer login é necessário inserir seu nome de usuário e a senha registrada.</p>
		<h1> Registro</h1>
		<p>Antes de poder logar é necessário registrar seu nome de usuário e senha, para fazer isso é necessário clicar no botão "cadastre-se" na tela de login e assim você será direcionado para a tela de registro e poderá registrar seu usuário e senha.</p>
		</div>
</div>

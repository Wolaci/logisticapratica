<?php
session_start();
require('../menu.php');
?>

<style>
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
.container label, b{
  color: white;
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
}
</style>
<form action="../login/verlog.php" method="post">
    <?php  
   
  if(isset($_SESSION['logErro'])){
    echo '<div class="container" style="text-align:center; border:2px solid #f00;   background-color:rgba(255,0,0,0.6);">';
    if (isset($_SESSION['erro'])) {
      echo "login e/ou senha incorreto ";
    }
    echo '</div>';
  }
  ?>
  <div class="container">
       <label for="uname"><b>Usuário</b></label>
         <input type="text" placeholder="Ex: Luiz Inácio Lula da Silva" name="login" required>
       <label for="psw"><b>Senha</b></label>
         <input type="password" placeholder="Ex: ********" name="senha" required>
         <button type="submit">Login</button>
  </div>
</form>


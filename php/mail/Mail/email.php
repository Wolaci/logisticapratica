<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
function email($email, $nome){
$data = date('d/m/y');
$mail = new PHPMailer;
//Aqui é a call do bozo, onde você decide qual protocolo vai usar, se é pop3 etc..
$mail->isSMTP();
//Aqui é onde os erros vão ficar evidentes
// 0 = não mostrar msgs
// 1 = msg do navegador
// 2 = msg do navegador e erros do server
$mail->SMTPDebug = 0;
//o ip do servidor de email de sua preferencia
$mail->Host = 'smtp.gmail.com';
//colocar a porta do smtp
$mail->Port = 587;
//definir o tipo de criptografia https
$mail->SMTPSecure = 'tls';
//verificação se o email é válido mesmo
$mail->SMTPAuth = true;
//Email de quem vai enviar 
$mail->Username = "raulbarrosmr@gmail.com";
//Senha do email a cima  kkk
$mail->Password = "";
//Definir Formato de escrita
$mail->CharSet = 'UTF-8';
//Aqui a gente coloca realmente o titulo e o email de quem está enviando
$mail->setFrom('raulbarrosmr@gmail.com', 'Logística Prática');
//Aqui já é no caso se a pessoa tiver outro email pra enviar.
$mail->addReplyTo('raulbarrosmr@gmail.com', 'Logística Prática');
//Atenção, aqui é aonde o email e o nome dos usuários ficaram
$mail->addAddress($email, $nome);
//Corpo, oq vai ter dentro da caixa de email
$mail->Subject = "Olá, ".$nome." Quer aprender sub-rede?".$data;
$mail->IsHTML(true);
//Aqui a gente coloca um html básico para envio
$mail->msgHTML(file_get_contents('emailTeste.php'), dirname(__FILE__));
//Colocar mensagem no corpo do email
// $mail->Body = "<h1>Olá ".$nome."Segue o link do tutorial de sub-redes"."</h1>";
// $mail->AltBody = 'Teste';
$mail->addAttachment('Mail.zip');
//se caso ocorrerem erros, ele imprime na tela ypah
	if(!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	    echo "Message sent!";

	}
}
$email = 'libnarodrigues723@gmail.com';
$nome = '1 Período - Tarde - 2018';
email($email, $nome);
 ?>
<?php

require './lib/autoload.php';

//o codigo abaixo ele colou da documentação do PHP MAIL

//esse codigo vai receber via metodo get (parametros na url) os valores digitados no formulario de contato da pagina contato.tpl

$to      = Config::EMAIL_USER; //email para onde sera enviado (to é para)
$subject = 'Contato - Loja Glaicon'; // vai ser o assunto (titulo)
$message = 'Email de '.$_GET['txtinputnome']. "\r\n" .$_GET['txtinputarea']; // nome de quem enviou e a mensagem
$dest = $_GET['txtinputemail'];
$headers = "From: " .$dest; //email de quem enviou a mensagem (from é de) --Obs: aqui temos que usar aspas dupla  

mail($to, $subject, $message, $headers); // função que envia o email com o seus parâmetros

Sistema::janelaModal("Mensagem enviada com sucesso!");
Rotas::Redirecionar(2, Rotas::pag_Contato());
?>


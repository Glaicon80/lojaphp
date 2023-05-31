<?php

require '../lib/autoload.php';


if (!isset($_SESSION)) {
  session_start();
}

$dados= filter_input_array(INPUT_POST,FILTER_DEFAULT);


//use Mpdf\QrCode\QrCode; // aqui vamos chamar a classe que vai montar o qrcode, importamos essa biblioteca
//use Mpdf\QrCode\Output; // classe que vai fazer o qrcode aparecer na tela

//INSTANCIA DA API PIX
$obApiPix = new Api(Config::API_PIX_URL,
                    Config::API_PIX_CLIENT_ID,
                    Config::API_PIX_CLIENT_SECRET,
                    Config::API_PIX_CERTIFICATE,
                    Config::API_PIX_KEYCERTIFICATE);



//RESPOSTA DA REQUISIÇÃO DE CRIAÇÃO DA COBRANÇA
$response = $obApiPix->getAccessToken();  // vamos mandar a requisição acessando a classe API


$retorna = ['token'=>$response];

echo json_encode($retorna);

?>
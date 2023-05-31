<?php

require "../lib/autoload.php";
 
//$url= Config::URL_PAGSEGURO_SD."sessions?email=".Config::EMAIL_VENDEDOR."&token=".Config::TOKEN_PAGSURO_SD;
$url= Config::URL_PAGSEGURO."sessions?email=".Config::EMAIL_VENDEDOR."&token=".Config::TOKEN_PAGSURO;
$curl = curl_init($url); // a url acima do pagseguro é de certificado POST, e o curl suporta o POST e retorna a resposta.
curl_setopt($curl,CURLOPT_HTTPHEADER,array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,true);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$retorno=curl_exec($curl);
curl_close($curl);

$xml=simplexml_load_string($retorno);

echo json_encode($xml);


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

//CORPO DA REQUISIÇÃO
$request = [                      // aqui vamos montar o corpo da requisição de cobrança (array) , olhar na documentação do PS para ver mais detalhes desse corpo
  'calendario' => [
    'expiracao' => 3600            // tempo em segundos (int) de validade desse pix
  ],
  'devedor' => [
    'cpf' => $dados['cpf'],
    'nome' => $dados['cliente'],
  ],
  'valor' => [
    'original' => $dados['valorTotalComPto']      // valor de cobrança
  ],
  'chave' => '+5534988751476', // a chave do pagseguro é  o telefone celular
  'solicitacaoPagador' => 'Pagamento de compra na Loja do Glaicon',
  'infoAdicionais' => [
                       ['nome' => 'Total Protudos','valor' => $dados['totalProtudos']],
                       ['nome' => 'Frete','valor' => $dados['frete']],
                       ['nome' => 'Valor total','valor' => $dados['valorTotal']],
                       ['nome' => 'Itens','valor' => $dados['itens']]
                      ]
    
             ];


$min = (int) 1000000000;
$max = (int) 9999999999;
$txid1 = (String)(rand ( $min , $max)); // vai ser um numero randomico de 10 caracteres
$txid2 = (String)(rand ( $min , $max));
$txid3 = (String)(rand ( $min , $max));

$txid = $txid1.$txid2.$txid3;  // vai ser um numero randomico de 30 caracteres para definir o txid

//vamos criar uma sessão para receber o txid
$_SESSION['PED']['txid'] = $txid;

//RESPOSTA DA REQUISIÇÃO DE CRIAÇÃO DA COBRANÇA
$response = $obApiPix->createCob($txid,$request);  // vamos mandar a requisição acessando a classe API

//VERIFICA A EXISTÊNCIA DO ITEM 'LOCATION'
if(!isset($response['location'])){         // na resposta da requisição acima se nao tive o location no array foi pq deu algum erro na criaçao da cobrança (pix)
   
   echo json_encode($response);
 exit;
}

//INSTANCIA PRINCIPAL DO PAYLOAD PIX
$obPayload = (new PayloadDinamico)->setMerchantName(Config::PIX_MERCHANT_NAME)
                          ->setMerchantCity(Config::PIX_MERCHANT_CITY)
                          ->setAmount($response['valor']['original'])
                          ->setTxid($response['txid'])
                          ->setUrl($response['location'])
                          ->setUniquePayment(true);

//CÓDIGO DE PAGAMENTO PIX
 $payloadQrCode = $obPayload->getPayload(); //aqui vai gerar uma string com todas as informações 

 //vamos criar uma sessão para receber o payload o pix
 $_SESSION['PED']['payloadPix'] = $payloadQrCode;

//QR CODE
//$obQrCode = new QrCode($payloadQrCode);

//IMAGEM DO QRCODE
//$image = (new Output\Png)->output($obQrCode,400);

$retorna = ['payloadQrCode'=>$payloadQrCode];

echo json_encode($retorna);

?>


<?php 

require_once '../lib/autoload.php';
include 'configuracao.php';


$consulta=isset($_POST['notificationCode'])?$_POST['notificationCode']:"";



if(!empty($consulta)){

//$url= "https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/".$consulta."?email=".Config::EMAIL_VENDEDOR."&token=".Config::TOKEN_PAGSURO_SD;
$url= "https://ws.pagseguro.uol.com.br/v3/transactions/notifications/".$consulta."?email=".Config::EMAIL_VENDEDOR."&token=".Config::TOKEN_PAGSURO;
$curl = curl_init($url); // a url acima do pagseguro é de certificado POST, e o curl suporta o POST e retorna a resposta.
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,true);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$retorno=curl_exec($curl);
curl_close($curl);

$xml=simplexml_load_string($retorno);


if($xml->status==1){

    $pedidoStatus= "Aguardando pagamento";

}else if($xml->status==2){

    $pedidoStatus= "Em análise";

}else if($xml->status==3){

    $pedidoStatus= "Pago";

}else if($xml->status==4){

    $pedidoStatus= "Disponível";

}else if($xml->status==5){

    $pedidoStatus= "Em disputa";

}else if($xml->status==6){

    $pedidoStatus= "Devolvida";

}else if($xml->status==7){

    $pedidoStatus= "Cancelada";

}

$pedidos = new Pedidos();

$pedidos->Alterar($xml->reference,$pedidoStatus);

}
 
    
  
    //enviar email de alteração do stutos da compra
    $email = new EnviarEmail();
  
    $destinatarios = array(Config::SITE_EMAIL_ADM,$xml->sender->email); //os destinatarios sera o Administrado e a pessoa que estiver comprando
    $assunto = 'Atualização do Status de Pedido - ' . Sistema::DataAtualBR(); // esse é o titulo que vai aparecer na lista de email do administrador e na mensagem do cliente
   // $msg = $smarty->fetch('email_compra.tpl'); // no body (no corpo do email) nós conseguimos enviar um template via smarty inteiro,porem esse template tem que ser estilizado via html/css pois os emails não aceitam o bootstrapp
                                                // o gmail parece não aceitar nem css
     
  
  $msg = '<p style="text-align:center;"> Atualização do Status do pedido do Cliente: '.$xml->sender->name.' </p><br>
  
  
      <p style="text-align:center;"> Estatus do pedito:<span style="font-size:15px;font-style: bold;color:#062a46;">'.$pedidoStatus.'</span></p><br>
      
      <p style="text-align:center;"> Referência: '.$xml->reference.'';
      
      
  
    $email->Enviar($assunto, $msg, $destinatarios);
  
  
?>
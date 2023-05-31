<?php 

require '../lib/autoload.php';

date_default_timezone_set('America/Sao_Paulo');

if(!isset($_SESSION)){ 
	session_start();   
}

$carrinho = new Carrinho();

$dados= filter_input_array(INPUT_POST,FILTER_DEFAULT); //filter_input_array vai transformar a string num array tem que ser um array pois sao muitos valores na string

$dadosArray['email']= Config::EMAIL_VENDEDOR;
$dadosArray['token']=Config::TOKEN_PAGSURO;


$dadosArray['paymentMode']='default';
$dadosArray['paymentMethod']=$dados['MetodoPagamento'];
$dadosArray['receiverEmail']=$dados['emailLoja'];
$dadosArray['currency']=$dados['moedaPagamento'];
$dadosArray['extraAmount']=$dados['descontoTaxa'];

$a=0;

foreach($carrinho->GetCarrinho() as $row_car ){
    $a++;

$dadosArray["itemId{$a}"]=$row_car["pro_id"];
$dadosArray["itemDescription{$a}"]=$row_car["pro_nome"];
$dadosArray["itemAmount{$a}"]=number_format($row_car["pro_valor_us"],2,'.','');
$dadosArray["itemQuantity{$a}"]=$row_car["pro_qtd"];

    }


$dadosArray['notificationURL']=$dados['urlNotificacao'];
$dadosArray['reference']=$dados['referenceItem'];
$dadosArray['senderName']=$dados['nomeCompleto'];
$dadosArray['senderCPF']=$dados['cpf'];
$dadosArray['senderAreaCode']=$dados['ddd'];
$dadosArray['senderPhone']=$dados['telefone'];
$dadosArray['senderEmail']=$dados['iemail'];
$dadosArray['senderHash']=$dados['identificador'];
$dadosArray['shippingAddressRequired']=$dados['entrega'];
$dadosArray['shippingAddressStreet']=$dados['logradouro'];
$dadosArray['shippingAddressNumber']=$dados['numero'];
$dadosArray['shippingAddressComplement']=$dados['complemento'];
$dadosArray['shippingAddressDistrict']=$dados['bairro'];
$dadosArray['shippingAddressPostalCode']=$dados['cep'];
$dadosArray['shippingAddressCity']=$dados['cidade'];
$dadosArray['shippingAddressState']=$dados['estado'];
$dadosArray['shippingAddressCountry']=$dados['pais'];
$dadosArray['shippingType']=$_SESSION['PED']['frete_tipo'];

$dadosArray['shippingCost']=str_replace(",","." ,str_replace(".","",$_SESSION['PED']['frete'])); //vai tirar do formato moeda BR, primeiro vai eliminar os pontos dos milhares e depois substituir a virgula por ponto no decimal

if($dados['MetodoPagamento']=="creditCard"){


$dadosArray['creditCardToken']=$dados['tokenCartao'];
$dadosArray['installmentQuantity']=$dados['qntParcelas'];
$dadosArray['installmentValue']=number_format($dados['valorParcelas'],2,'.','');
$dadosArray['noInterestInstallmentQuantity']=$dados['parcelasSemJuros'];
$dadosArray['creditCardHolderName']=$dados['nomeCartao'];
$dadosArray['creditCardHolderCPF']=$dados['cpfDonoCartao'];
$dadosArray['creditCardHolderBirthDate']=$dados['dataNascimentoDonoCartao'];
$dadosArray['creditCardHolderAreaCode']=$dados['ddd'];
$dadosArray['creditCardHolderPhone']=$dados['telefone'];
$dadosArray['billingAddressStreet']=$dados['logradouroDonoCartao'];
$dadosArray['billingAddressNumber']=$dados['numeroDonoCartao'];
$dadosArray['billingAddressComplement']=$dados['complementoDonoCartao'];
$dadosArray['billingAddressDistrict']=$dados['bairroDonoCartao'];
$dadosArray['billingAddressPostalCode']=$dados['cepDonoCartao'];
$dadosArray['billingAddressCity']=$dados['cidadeDonoCartao'];
$dadosArray['billingAddressState']=$dados['estadoDonoCartao'];
$dadosArray['billingAddressCountry']=$dados['paisDoCartao'];


}else if($dados['MetodoPagamento']=="eft"){

$dadosArray['bankName']=$dados['selecionaBanco'];

}

$buildQuery= http_build_query($dadosArray);  // http_build_query — Gera a string de consulta (query) em formato URL
$url = Config::URL_PAGSEGURO. "transactions";
$curl = curl_init($url);
curl_setopt($curl,CURLOPT_HTTPHEADER,Array("content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,true);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$buildQuery);
$retorno = curl_exec($curl);//é xnml
curl_close($curl);
$xml = simplexml_load_string($retorno); //simplexml_load_string — Interpreta uma string XML e a transforma em um objeto


$dadosCliente = "".$dados['nomeCompleto'].";".$dados['ddd']." ".$dados['telefone'].";".$dados['iemail']."";
$endereçoEntrega = "".$dados['logradouro'].";".$dados['numero'].";".$dados['complemento'].";".$dados['bairro'].";".$dados['cep'].";".$dados['cidade'].";".$dados['estado']."";

if($_SESSION['PED']['frete_tipo'] =="1"){
    $tipoFrete ="PAC";
}else if($_SESSION['PED']['frete_tipo'] =="2"){
    $tipoFrete ="SEDEX";
}else{

    $tipoFrete ="Moto boy";
}

$cliente = $_SESSION['CLI']['cli_id'];
$cod = $_SESSION['PED']['pedido'];
$ref = $xml->reference;
$frete = $_SESSION['PED']['frete'];
$pedidoCodigoPagSeguro = $xml->code;

if ($xml->paymentMethod->type==1) {

$tipo ='Cartão de crédito ('.$xml->installmentCount.' parcelas)';

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

$pedido = new Pedidos();

if($pedido->PedidoGravar($cliente,$cod,$ref,$frete,$tipoFrete,$pedidoStatus,$pedidoCodigoPagSeguro,$tipo,"----",$dadosCliente,$endereçoEntrega)){ //salva os registros no banco de dados do pedido e dos itens do pedido a condição vai ser true, ai  podemos limpar as sessoes

    baixaEstoque($ref);
    enviarEmailLimparSessoes($pedidoStatus);

}; 


}elseif ($xml->paymentMethod->type==2) {

$tipo ='Boleto';

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

$pedido = new Pedidos();

if($pedido->PedidoGravar($cliente,$cod,$ref,$frete,$tipoFrete,$pedidoStatus,$pedidoCodigoPagSeguro,$tipo,$xml->paymentLink,$dadosCliente,$endereçoEntrega)){ //salva os registros no banco de dados do pedido e dos itens do pedido a condição vai ser true, ai  podemos limpar as sessoes

    baixaEstoque($ref);
    enviarEmailLimparSessoes($pedidoStatus);

}; 



}elseif ($xml->paymentMethod->type==3) {


    $tipo ='Debito em conta';    


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
    
    $pedido = new Pedidos();

   
    
    if($pedido->PedidoGravar($cliente,$cod,$ref,$frete,$tipoFrete,$pedidoStatus,$pedidoCodigoPagSeguro,$tipo,$xml->paymentLink,$dadosCliente,$endereçoEntrega)){ //salva os registros no banco de dados do pedido e dos itens do pedido a condição vai ser true, ai  podemos limpar as sessoes
    
    baixaEstoque($ref);
    enviarEmailLimparSessoes($pedidoStatus);
    
    }; 

}




$retorna = ['erro'=>true, 'dados'=>$xml,'dadosArry'=>$dadosArray];
header('content-Type: application/json'); // header Envia um cabeçalho HTTP bruto que neste caso sera um json
echo json_encode($retorna); //json_encode Retorna uma string JSON codificada em caso de sucesso ou false em caso de falha.














// abaixo segue as funçoes







// essa função vai ser responsavel em enviar um email de confirmação da compra e limpar as sessoes
function enviarEmailLimparSessoes($pedidoStatus){

 
  $carrinho = new Carrinho();

  //enviar email de confirmação da compra
  $email = new EnviarEmail();

  $destinatarios = array(Config::SITE_EMAIL_ADM, $_SESSION['CLI']['cli_email']); //os destinatarios sera o Administrado e a pessoa que estiver comprando
  $assunto = 'Pedido da Loja Glaicon - ' . Sistema::DataAtualBR(); // esse é o titulo que vai aparecer na lista de email do administrador e na mensagem do cliente
 // $msg = $smarty->fetch('email_compra.tpl'); // no body (no corpo do email) nós conseguimos enviar um template via smarty inteiro,porem esse template tem que ser estilizado via html/css pois os emails não aceitam o bootstrapp
                                              // o gmail parece não aceitar nem css
   

// agora vamos criar a string html/css que vai compor a mensagem que vai ser exibida no corpo do email OBS: tive que fazer assim pois não estava aceitando  smarty com template
  
$listarItens ="";
  
foreach ($carrinho->GetCarrinho() as $P) {
 
 // com str_replace vamos retirar os caracteres do nome da foto para ficar no padrao a ser usada em AddEmbeddedImage 
 $foto =str_replace(".jpg","","{$P['pro_img_para_email']}"); //aqui vai ficar o nome-da-imagem sem o jpg
 

 $email->AddEmbeddedImage("../media/images/{$P['pro_img_para_email']}", "{$foto}"); // vamos utilizar esse comando para poder adicionar a imagem no corpo do email, se não ela não chega no email
 
 $listarItens =$listarItens. '<tr style="border: 1px solid #b2dba1;"> 
                              <td> <img src="cid:'.$foto.'" width="150" height="150"> </td>
                              <td> '.$P['pro_nome'].'</td><td> '.$P['pro_valor'].'</td>
                              <td>'.$P['pro_qtd'].'</td><td>'.$P['pro_subTotal'].'</td>
                              </tr>';
                                             
  }                                              



$msg = '

     <p style="text-align:center;"> Olá '.$_SESSION['CLI']['cli_nome'].' , obrigado pela sua compra na '.Config::SITE_NOME.' <br>
    <a href="'.Rotas::get_SiteHOME().'">'.Rotas::get_SiteHOME().'</a>
    </p>


    <p style="text-align:center;"> Estatus do pedito:<span style="font-size:15px;font-style: bold;color:#062a46;">'.$pedidoStatus.'</span></p>
    
    
      <section class="row">
          <p style="text-align:center;">
              Para acessar a sua conta e acompanhar o andamento dos seus pedidos acesse nosso site, e sua conta<br>
              <a  href="'.Rotas::pag_CLientePedidos().'" > Minha conta: '.Rotas::pag_CLientePedidos().'</a>
          
          </p>                 
                       
      </section>
    
    
    <section class="row ">
       
        <center>
          
         
       <br>
            
        <table style="width: 100%; border-collapse: collapse;">
         
            <tr style="
                border: 1px solid #b2dba1; 
                
                background-color: #072339;
                color:#FFF;
                font-size:18px;" >
    
              <td colspan="5">Itens do seu pedido </td> <!--colspan vai espandir o td para 5 colunas para bater com as de baixo -->
            </tr>
         
            '.$listarItens.'
            
         </table>
      
        </center>
            
               
    </section><!-- fim da listagem itens -->
    
    
       <!-- botoes de baixo e valor total -->
            <div class="sessao">
                          
                
    
                   <p style="text-align:right;">
                   <b>Total :</b> R$ '.Sistema::MoedaBR($carrinho->GetTotal()).'
                   </p>
                   <p style="text-align:right;">
                   <b>Frete</b> : R$ '.$_SESSION['PED']['frete'].'
                   </p>
                   <p style="text-align:right;
                             font-size:18px;
                             font-style: bold;
                             color:#062a46;">
                   <b>Final : R$ '.$_SESSION['PED']['total_com_frete'].'</b>
                   </p>
    
                
              <!-- Os email não aceitam o bootstrap e o gmail tbm não aceitou o css chamado pelas classes
               para fazer a formatação no gmail tive que colocar o style das tags html-->  
                
            </div>
                   <br>

';



  $email->Enviar($assunto, $msg, $destinatarios);


  //vamos apagar as sessões
  unset($_SESSION['PRO']);
  unset($_SESSION['PED']);
}







// função para dar baixa no estoque e enviar mensagem de estoque baixo
function baixaEstoque($ref){


    $itens = new Itens();

    $email = new EnviarEmail();
    
    $produtos = new Produtos();

    $vendas = new Vendas();
    
    $itens->GetItensPedido($ref);
    
    foreach($itens->GetItens() as $baixa ){
    
      $estoque =  $baixa["pro_stq"] -  $baixa["item_qtd"]; 
    
      if($estoque<$baixa["pro_stq_min"]){
    
        $destinatarios = array(Config::SITE_EMAIL_ADM);
        $assunto = 'Alerta estoque da Loja Glaicon - ' . Sistema::DataAtualBR();
        $msg = '<p style="text-align:center;"> Olá, o estoque do produto  '.$baixa['item_nome'].' é de '.$estoque.' itens. Esta abaixo do estoque mínimo de '.$baixa['pro_stq_min'].'  de itens.</p>';
        $email->Enviar($assunto, $msg, $destinatarios);
      }
    
     $vendas->inserir($baixa["pro_id"],$baixa["item_valor_us"],$baixa["item_qtd"],$baixa["ped_data_us"]);
     $produtos->BaixaEstoque($baixa["pro_id"],$estoque,);
     
    }


}

?>
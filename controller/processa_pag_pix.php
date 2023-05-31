<?php

// aqui vamos fazer a consulta para ver se o pagamento do pix foi realizado , para isto o status vai ter que estar CONCLUIDO, e os valores tem que bater
// o status concluido só é possivel no modo de produção, no sandbox sempre vai ser ATIVO


require '../lib/autoload.php';

date_default_timezone_set('America/Sao_Paulo');

if(!isset($_SESSION)){ 
	session_start();   
}



$dados= filter_input_array(INPUT_POST,FILTER_DEFAULT);


$dadosCliente = "".$dados['nomeCompleto'].";".$dados['ddd']." ".$dados['telefone'].";".$dados['iemail']."";
$endereçoEntrega = "".$dados['logradouro'].";".$dados['numero'].";".$dados['complemento'].";".$dados['bairro'].";".$dados['cep'].";".$dados['cidade'].";".$dados['estado']."";



//INSTANCIA DA API PIX
$obApiPix = new Api(Config::API_PIX_URL,
                    Config::API_PIX_CLIENT_ID,
                    Config::API_PIX_CLIENT_SECRET,
                    Config::API_PIX_CERTIFICATE,
                    Config::API_PIX_KEYCERTIFICATE);                    

  //vai receber o txid gravado na sessão                  
   $txid = $_SESSION['PED']['txid'];                   

//RESPOSTA DA CONSULTA DE PIX GERADO
$response = $obApiPix->consultCob($txid);

//VERIFICA A EXISTÊNCIA DO ITEM 'LOCATION'
if(!isset($response['location'])){
  echo 'Problemas ao consultar Pix dinâmico';
  echo "<pre>";
  print_r($response);
  echo "</pre>"; exit;
}

//DEBUG DOS DADOS DO RETORNO
//echo "<pre>";
//print_r($response);
//echo "</pre>";//exit;


// validação para saber se pix foi pago
if($response['status']== "CONCLUIDA"){

if(isset($response['pix'][0]['valor'])){

  if($response['pix'][0]['valor'] == $response['valor']['original']){

   $status = $response['status'].' - PAGA';

  }else{

    $status = $response['status'].' - valor pago diferente do valor cobrado';
  }

}else{

  $status = $response['status'].' - aguardando pagamento';
}
}else{

  $status = $response['status'];

}



if($_SESSION['PED']['frete_tipo'] =="1"){
  $tipoFrete ="PAC";
}else if($_SESSION['PED']['frete_tipo'] =="2"){
  $tipoFrete ="SEDEX";
}else{

  $tipoFrete ="Moto boy";
}

$valorCompra = $_SESSION['PED']['total_com_frete'];
$cliente = $_SESSION['CLI']['cli_id'];
$cod = $_SESSION['PED']['pedido'];
$payloadPix = $_SESSION['PED']['payloadPix'];
$ref = $_SESSION['PED']['ref'];
$frete = $_SESSION['PED']['frete'];


$pedido = new Pedidos();
    
    if($pedido->PedidoGravar($cliente,$cod,$ref,$frete,$tipoFrete,$status,$response['txid'],'Pix',$payloadPix,$dadosCliente,$endereçoEntrega)){ //salva os registros no banco de dados do pedido e dos itens do pedido a condição vai ser true, ai  podemos limpar as sessoes
    
      baixaEstoque($ref);
      enviarEmailLimparSessoes($status);
    
    }else{

      echo'Problemas ao finalizar pedido!!';

    }



    $retorna = ['status'=>$status, 'txid'=>$txid,'valor'=>$valorCompra, 'codPix'=>$payloadPix, 'ref'=>$ref];
    header('content-Type: application/json'); // header Envia um cabeçalho HTTP bruto que neste caso sera um json
    echo json_encode($retorna); //json_encode Retorna uma string JSON codificada em caso de sucesso ou false em caso de falha.





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
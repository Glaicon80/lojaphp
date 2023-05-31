<?php



$smarty = new Template();

$categoria = new Categorias();
$categoria->GetCategorias();



if (!Login::Logado()) { //se não existir a sessão CLI
  Sistema::janelaModal("Acesso negado, faça seu login!");
  Rotas::Redirecionar(2, Rotas::pag_ClienteLogin());
} else {  
  if (isset($_SESSION['PRO'])) { // se não existir a sessão é pq não tem nenhum produto no carrinho


    if (!isset($_SESSION['PED']['frete'])) { //caso alguem tente entrar direto na pagina finalizar sem passar pelo confirmar (onde foi criada a sessão) ele sera redirecionado
      Rotas::Redirecionar(1, Rotas::pag_Carrinho() . '#dadosfrete');
      exit('<h4 class="alert alert-danger"> Precisa selecionar o frete! </h4>');
    }

   


    // vamos criar uma sessão para guardar o codigo do pedido gerado automaticamente atraves das datas
    if (!isset($_SESSION['PED']['pedido'])) { //se não existe a sessão entao ela sera criada
      $_SESSION['PED']['pedido'] = date('YmdHms') . $_SESSION['CLI']['cli_id'];
    }



    //vamos criar uma sessão para guardar a referencia do pedido gerado automaticamente atraves das datas
    if (!isset($_SESSION['PED']['ref'])) { //se não existe a sessão entao ela sera criada
      $_SESSION['PED']['ref'] = date('YmdHms') . $_SESSION['CLI']['cli_id'];
    }


    $carrinho = new Carrinho();


    //for abaixo vai ser usado caso use o pix como pagamento
    $listarParaPix ="";

    foreach ($carrinho->GetCarrinho() as $P) {

    $listarParaPix = $listarParaPix." - ".$P['pro_nome']." ". $P['pro_qtd']." ".$P['pro_valor'];
  
    }

    foreach($_SESSION['CLI'] as $campo => $valor){
      $smarty->assign(strtoupper($campo), $valor); //strtoupper Converte uma string para maiúsculas
    }

        
    $smarty->assign('TOTAL_CARRINHO', Sistema::MoedaBR($carrinho->GetTotal()));
    $smarty->assign('CARRINHO', $carrinho->GetCarrinho());
    $smarty->assign('CLI_ID', $_SESSION['CLI']['cli_id']);
    $smarty->assign('CLI_COD',$_SESSION['PED']['pedido']);
    $smarty->assign('CLI_REF',$_SESSION['PED']['ref']);
    $smarty->assign('CLI_FRETE',$_SESSION['PED']['frete']);
    $smarty->assign('CLI_TOTAL_FRETE',$_SESSION['PED']['total_com_frete']);
    $smarty->assign('CATEGORIAS', $categoria->GetItens());
    $smarty->assign('LISTAPARAPIX', $listarParaPix);
    $smarty->assign('EMAILVENDEDOR', Config::EMAIL_VENDEDOR);
    $smarty->assign('MOEDA_PAGAMENTO', Config::MOEDA_PAGAMENTO);
    $smarty->assign('URL_NOTIFICACAO', Config::URL_NOTIFICACAO);
    $smarty->assign('CEP', $_SESSION['PED']['cep']);
    $smarty->assign('DATANASCIMENTOCARTAO', Sistema :: Fdata($_SESSION['CLI']['cli_data_nasc']));
    $smarty->assign('', $_SESSION['PED']['cep']);
    $smarty->assign('SCRIPT_PAGSEGURO_SD', Config::SCRIPT_PAGSEGURO); 
    $smarty->assign('PAG_PROCESSA_PAGUI_PIX', Rotas::pag_processa_pag_pix()); 
    $smarty->assign('VOLTARCARRINHO', Rotas::pag_Carrinho());
    $smarty->assign('MEDIA', Rotas::get_SiteMEDIA());
    $smarty->assign('TEMA', Rotas::get_SiteTEMA());
    $smarty->assign('CLIENTEPEDIDO', Rotas::pag_CLientePedidos()); 

    $smarty->display('pagamento.tpl');

  } else {

    Sistema::janelaModal('Não possui produtos no carrinho!');
    Rotas::Redirecionar(3, Rotas::pag_Produtos());
  }
}



?>


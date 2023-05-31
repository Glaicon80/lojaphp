<?php 

if(!isset($_SESSION)){ // aqui em index.php se não existir uma sessão entao vamos iniciar uma
	session_start();   // a vatangem de colocar o session_star na index.php é que tudo vai passar por ela, desta forma não precisa iniciar a sessão nas outras paginas
}


date_default_timezone_set('America/Sao_Paulo');// este comando foi feito para que o sistema leve em consideração o fuso horario de sao paulo, pois pode acontecer qdo salvar a hora do sistema ela vir diferente por conta do fuso horario



require '../lib/autoload.php'; // aqui colocou dois pontinhos (..) pq teve que voltar uma pastas

$smarty = new Template();


$categoria = new Categorias();
$categoria->GetCategorias();



$smarty->assign('PAG_MINHACONTA', Rotas::pag_MinhaConta());
$smarty->assign('MEDIA', Rotas::get_SiteMEDIA());
$smarty->assign('PAG_LOGOFF', Rotas::pag_Logoff());
$smarty->assign('LOGADO', Login::LogadoADM());
$smarty->assign('CATEGORIAS', $categoria->GetItens());
$smarty->assign('PAG_LOGOFF', Rotas::pag_LogoffADM());
$smarty->assign('PAG_SENHA', Rotas::get_SiteADM() .'/adm_senha');
$smarty->assign('PAG_ADM_CLIENTE', Rotas::pag_ClientesADM());
$smarty->assign('PAG_ADM_PEDIDOS', Rotas::pag_PedidosADM());
$smarty->assign('PAG_CATEGORIAS', Rotas::pag_CategoriasADM());
$smarty->assign('PAG_ADM_PRODUTOS', Rotas::pag_ProdutosADM());
$smarty->assign('GET_SITE_ADM', Rotas::get_SiteADM());
$smarty->assign('PAG_ADM_VENDAS', Rotas::pag_VendasADM());
$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
$smarty->assign('DATA', Sistema::DataAtualBR());
$smarty->assign('TITULO_SITE', Config::SITE_NOME);


if(Login::LogadoADM()){ // se ele estiver logado (vai estiver logado se a sessão cliente $_SESSION['ADM'] existir)
	$smarty->assign('USER', $_SESSION['ADM']['user_nome']);
	$smarty->assign('DATA', $_SESSION['ADM']['user_data']);
	$smarty->assign('HORA', $_SESSION['ADM']['user_hora']);

	$smarty->display('adm_index.tpl'); //o comando display para o template sempre tem que ser o ultimo comando
	
} else{

	
	Rotas::Redirecionar(0,'login.php');
	
}




?>
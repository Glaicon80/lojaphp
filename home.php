<?php 

if(!isset($_SESSION)){ // aqui em index.php se não existir uma sessão entao vamos iniciar uma
	session_start();   // a vatangem de colocar o session_star na index.php é que tudo vai passar por ela, desta forma não precisa iniciar a sessão nas outras paginas
}


date_default_timezone_set('America/Sao_Paulo');// este comando foi feito para que o sistema leve em consideração o fuso horario de sao paulo, pois pode acontecer qdo salvar a hora do sistema ela vir diferente por conta do fuso horario



require "lib/autoload.php";

$smarty = new Template();


$categoria = new Categorias();
$categoria->GetCategorias();

$produtos = new Produtos();   
$produtos->GetProdutos();
    


$smarty->assign('PRO',$produtos->GetItens());

$smarty->assign('PAG_MINHACONTA', Rotas::pag_MinhaConta());
$smarty->assign('PRO_INFO',Rotas::pag_ProdutosInfo());
$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
$smarty->assign('PAG_CARRINHO', Rotas::pag_Carrinho());
$smarty->assign('PAG_CONTATO', Rotas::pag_Contato());
$smarty->assign('GET_HOME', Rotas::get_SiteHOME());
$smarty->assign('PAG_PRODUTO', Rotas::pag_Produtos());
$smarty->assign('MEDIA', Rotas::get_SiteMEDIA());
$smarty->assign('PAG_LOGOFF', Rotas::pag_Logoff());
$smarty->assign('LOGADO', Login::Logado());
$smarty->assign('CATEGORIAS', $categoria->GetItens());
$smarty->assign('TITULO_SITE', Config::SITE_NOME);
$smarty->assign('DATA', Sistema::DataAtualBR());
$smarty->assign('CONTROLE', Rotas::get_Pasta_Controller() .'/produtos.php');
$smarty->assign('INCLUDE', 'include_once');

if(Login::Logado()){ // se ele estiver logado (vai estiver logado se a sessão cliente $_SESSION['CLI'] existir)
$smarty->assign('USER', $_SESSION['CLI']['cli_nome']);
	
} 


$smarty->display('home.tpl');



?>
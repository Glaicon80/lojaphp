<?php

if(isset($_SESSION['PRO'])) { //se o usuario entrar na pagina do carrinho, e não tiver nem um produto no carrinho quer dizer que a sessao dos produtos ainda nao existe e isso vai gerar erro
                              // por isso o if



	$smarty = new Template();

	$carrinho = new Carrinho();

	
	$smarty->assign('PRO', $carrinho->GetCarrinho());
	$smarty->assign('TOTAL', Sistema::MoedaBR($carrinho->GetTotal()));
    $smarty->assign('PESO', Sistema::MoedaBR($carrinho->GetPeso()));
    $smarty->assign('COMPRIMENTO', Sistema::MoedaBR($carrinho->GetComprimento()));
    $smarty->assign('ALTURA', Sistema::MoedaBR($carrinho->GetAltura()));
    $smarty->assign('LARGURA', Sistema::MoedaBR($carrinho->GetLargura()));
	$smarty->assign('PAG_PRODUTOS', Rotas::pag_Produtos());
	$smarty->assign('PAG_CARRINHO_ALTERAR', Rotas::pag_CarrinhoAlterar()); //http://localhost/lojaphp/carrinho_alterar
	$smarty->assign('PESO', number_format($carrinho->GetPeso(),3,'.',''));



	$smarty->display('carrinho.tpl');

}else{
    
	Sistema::janelaModal('Carrinho vazio'); //codigo javascript que vai abrir janela modal de index.tpl
	
	Rotas::Redirecionar(1, Rotas::pag_Produtos());
}

 ?>


 
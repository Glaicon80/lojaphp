<?php 

$smarty = new Template();

$produtos = new Produtos();
$produtos->GetProdutosID(Rotas::$pag[1]); // lembrando que pag é um array da url que digitarmos onde as posições do array vai ser separados pela /
                                         // pag[0] vai ser o nome da pagina (produtos_info). pag[1] vai ser a posição do id do produto
                                         // todas essas informações vão esta na url

$image = new ProdutosImages();
$image->GetImagesPRO(Rotas::$pag[1]);

$smarty->assign('PRO', $produtos->GetItens());
$smarty->assign('IMAGES', $image->GetItens());
$smarty->assign('MEDIA', Rotas::get_SiteMEDIA());
$smarty->assign('PAG_COMPRAR', Rotas::pag_CarrinhoAlterar());



/* aqui foi um codigo para testar se o carrinho estava funcionando

$ID = Rotas::$pag[1];
foreach ($produtos->GetItens() as $pro) {
	$_SESSION['PRO'][$ID]['ID'] = $pro['pro_id'];
	$_SESSION['PRO'][$ID]['NOME'] = $pro['pro_nome'];
    $_SESSION['PRO'][$ID]['VALOR'] = $pro['pro_valor'];
    $_SESSION['PRO'][$ID]['VALOR_US'] = $pro['pro_valor_us'];
    $_SESSION['PRO'][$ID]['PESO'] = $pro['pro_peso'];
    $_SESSION['PRO'][$ID]['QTD'] = 1;
    $_SESSION['PRO'][$ID]['IMG'] = $pro['pro_img_p'];
    $_SESSION['PRO'][$ID]['LINK'] = 'sssslink';
    $ID++;
}

*/




$smarty->display('produtos_info.tpl');

 ?>
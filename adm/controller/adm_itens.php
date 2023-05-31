<?php 

$smarty = new Template();


if(!isset($_POST['cod_pedido'])){ // se não existi um post com o codigo do pedido
	
	Sistema::janelaModal("Selecione um pedido");
	Rotas::Redirecionar(2, Rotas::pag_PedidosADM()); //http://localhost/lojaphp/adm/adm_pedidos
	
}else{

$itens = new Itens();
$pedido = filter_var($_POST['cod_pedido'], FILTER_SANITIZE_STRING);




$itens->GetItensPedido($pedido);

 $getItens = $itens->GetItens();

$dadosCliente= explode(';', $getItens [1]['ped_cliente_entrega']); // aqui vai pegar os dados do cliente e jogar num array

$dadosEntrega = explode(';', $getItens [1]['ped_entrega']); // aqui vai pegar os dados de entrega e jogar num array quebrando a string com a função explode


$smarty->assign('ITENS', $getItens);
$smarty->assign('CLIENTE', $dadosCliente);
$smarty->assign('ENTREGA', $dadosEntrega);
$smarty->assign('TOTAL', $itens->GetTotal());


$smarty->display('adm_itens.tpl');

}

?>
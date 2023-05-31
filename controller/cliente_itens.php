<?php 

$smarty = new Template();

Login::MenuCliente();


if(!isset($_POST['cod_pedido'])){  // se não existir o codigo do pedido via post vai retornar para clientes_pedidos
	Rotas::Redirecionar(0, Rotas::pag_ClientePedidos());
	exit(); // vai interrope o codigo
}

$itens =  new Itens();
$pedido = filter_var($_POST['cod_pedido'], FILTER_SANITIZE_STRING);// aqui adicionamos mais proteção fazendo um filtro onde vai aceitar apenas o codigo do pedido. Impedindo qualquer artificio como injetar algum dado na url
                                                                   // não é obrigatorio, poderia colocar $_POST['cod_pedido'] apenas
$itens->GetItensPedido($pedido);

 $getItens = $itens->GetItens();

$dadosCliente= explode(';', $getItens [1]['ped_cliente_entrega']); // aqui vai pegar os dados do cliente e jogar num array

$dadosEntrega = explode(';', $getItens [1]['ped_entrega']); // aqui vai pegar os dados de entrega e jogar num array quebrando a string com a função explode


$smarty->assign('ITENS', $getItens);
$smarty->assign('CLIENTE', $dadosCliente);
$smarty->assign('ENTREGA', $dadosEntrega);
$smarty->assign('TOTAL', $itens->GetTotal());


$smarty->display('cliente_itens.tpl');

 ?>
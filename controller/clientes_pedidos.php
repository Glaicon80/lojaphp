<?php 

$smarty = new Template();

Login::MenuCliente(); // se estiver logado ele vai para menu_cliente.tpl se não esiver logado vai redirecionado para login.php para logar

$pedidos = new Pedidos();

$pedidos->GetPedidosCliente($_SESSION['CLI']['cli_id']);

$smarty->assign('PEDIDOS', $pedidos->GetItens());
$smarty->assign('PEDIDOS_QUANTIDADE', $pedidos->TotalDados());
$smarty->assign('PAG_ITENS', Rotas::pag_ClienteItens());
$smarty->assign('PAGINAS',$pedidos->ShowPaginacao());


$smarty->display('clientes_pedidos.tpl');

 ?>
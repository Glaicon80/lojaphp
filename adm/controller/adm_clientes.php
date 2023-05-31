<?php 

$smarty = new Template();


$clientes = new Clientes();
$clientes->GetClientes();

$smarty->assign('CLIENTES', $clientes->GetItens());
$smarty->assign('PAG_EDITAR', Rotas::pag_ClientesEditarADM()); //http://localhost/lojaphp/adm//adm_clientes_editar
$smarty->assign('PAG_PEDIDOS', Rotas::pag_PedidosADM()); //http://localhost/lojaphp/adm//adm_pedidos
$smarty->assign('PAGINAS',$clientes->ShowPaginacao());

$smarty->display('adm_clientes.tpl');

?>
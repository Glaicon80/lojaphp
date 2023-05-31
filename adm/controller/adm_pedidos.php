
<?php 

$smarty = new Template();

$pedidos = new Pedidos();



if(isset($_POST['ped_apagar'])){



	echo '<script>';
	echo   '$(document).ready(function(){';
	echo   '$("#modalDeletar").modal()';
	echo   '})';
	echo '</script>';

	 echo '<script>';
     echo '$(document).ready(function(){';
	 echo '$("#alertaApagar").val('.$_POST['cod_pedido'].')';
     echo'})';
     echo'</script>';

}


if(isset($_POST['deletarPedido'])){

	if($pedidos->Apagar($_POST['alertaApagar'])){
		
		Sistema::janelaModal("Pedido Excluido com Sucesso!!");
	}else{
		Sistema::janelaModal("Falha ao excluir pedido!!");

	}
}




if(isset(Rotas::$pag[1])){
	$id = (int)Rotas::$pag[1];
	$pedidos->GetPedidosCliente($id);

	}elseif(isset($_POST['data_ini']) and isset($_POST['data_fim'])){
			$pedidos->GetPedidosData($_POST['data_ini'], $_POST['data_fim']);
	}elseif(isset($_POST['txt_ref'])){
				$ref = filter_var($_POST['txt_ref'], FILTER_SANITIZE_STRING); // FILTER_SANITIZE_STRING vai permitir apenas string
				$pedidos->GetPedidosREF($ref);
	}

else{
	$pedidos->GetPedidosCliente();
}




$smarty->assign('PEDIDOS', $pedidos->GetItens());
$smarty->assign('PAG_ITENS', Rotas::pag_ItensADM());
$smarty->assign('PAGINAS', $pedidos->ShowPaginacao());

if($pedidos->TotalDados() > 0){
	$smarty->display('adm_pedidos.tpl');
}else{
	echo '<div class="alert alert-danger"> Nenhum pedido encontrado</div>';
}



?>
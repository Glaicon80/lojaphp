<?php 

$smarty = new Template();

$produtos = new Produtos();

if(isset($_POST['apagar'])){


	echo '<script>';
	echo   '$(document).ready(function(){';
	echo   '$("#modalExemplo").modal()';
	echo   '})';
	echo '</script>';

	 echo '<script>';
     echo '$(document).ready(function(){';
	 echo '$("#alertaMensagem2").val('.$_POST["pro_id_apagar"].')';
     echo'})';
     echo'</script>';

	 }


	if(isset($_POST['deletar'])){

	$produtos->GetProdutosID($_POST['alertaMensagem2']);
	$caminhoDaImagem = $produtos->GetItens();

	if($produtos->Apagar($_POST['alertaMensagem2'])){
		//echo '<div class="alert alert-success">Produto Excluido com Sucesso!!</div>';
		@unlink($caminhoDaImagem[1]['pro_img_arquivo']); // unlink — Apaga um arquivo    'pro_img_arquivo é o caminho ate a imagem
		
		Sistema::janelaModal("Produto Excluido com Sucesso!!");
		Rotas::Redirecionar(2, Rotas::pag_ProdutosADM());  // vai para pag de produtos do administrador
	//	exit(); //coloquemos o exit para ele nao continuar a execução abaixo
	}else{

		Sistema::janelaModal("O produto não pode ser excluido!!");
		Rotas::Redirecionar(2, Rotas::pag_ProdutosADM()); 
		//echo '<div class="alert alert-danger">O produto não pode ser excluido!!</div>';
	}

}elseif(isset(Rotas::$pag[1])){

$produtos->GetProdutosCateID(Rotas::$pag[1]);


$smarty->assign('PRO', $produtos->GetItens());
$smarty->assign('PRO_INFO', Rotas::pag_ProdutosInfo());
$smarty->assign('PRO_TOTAL', $produtos->TotalDados());
$smarty->assign('PAGINAS', $produtos->ShowPaginacao());
$smarty->assign('PAG_PRODUTO_NOVO', Rotas::pag_ProdutosNovoADM());
$smarty->assign('PAG_PRODUTO_EDITAR', Rotas::pag_ProdutosEditarADM());
$smarty->assign('PAG_PRODUTO_IMG', Rotas::pag_ProdutosImgADM());

$smarty->display('adm_produtos.tpl');

}else{
	
$produtos->GetProdutos();

$smarty->assign('PRO', $produtos->GetItens());
$smarty->assign('PRO_INFO', Rotas::pag_ProdutosInfo());
$smarty->assign('PRO_TOTAL', $produtos->TotalDados());
$smarty->assign('PAGINAS', $produtos->ShowPaginacao());
$smarty->assign('PAG_PRODUTO_NOVO', Rotas::pag_ProdutosNovoADM());
$smarty->assign('PAG_PRODUTO_EDITAR', Rotas::pag_ProdutosEditarADM());
$smarty->assign('PAG_PRODUTO_IMG', Rotas::pag_ProdutosImgADM());

$smarty->display('adm_produtos.tpl');

}

?>
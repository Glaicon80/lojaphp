<?php 

$smarty = new Template();
$categorias = new Categorias();


$categorias->GetCategorias();


if(isset($_POST['cate_nova'])){
	$cate_nome = $_POST['cate_nome'];
	if($categorias->Inserir($cate_nome)){
		echo '<div class="alert alert-success"> Categoria Inserida com sucesso!! </div>';
		Rotas::Redirecionar(0, Rotas::pag_CategoriasADM()); // vai dar o refrech e chamar a pagina adm_categorias
	}
}



if(isset($_POST['cate_editar'])){
	$cate_id = $_POST['cate_id'];
	$cate_nome = $_POST['cate_nome'];
	if($categorias->Editar($cate_id, $cate_nome)){
		//echo '<div class="alert alert-success"> Categoria Editada com sucesso!! </div>';
		Rotas::Redirecionar(0, Rotas::pag_CategoriasADM()); 
	}
}


if(isset($_POST['cate_apagar'])){
	$cate_id = $_POST['cate_id'];
	
	if($categorias->Apagar($cate_id)){
		//echo '<div class="alert alert-success"> Categoria Apagada com sucesso!! </div>';
		Rotas::Redirecionar(0, Rotas::pag_CategoriasADM());
	}else{
		Sistema::janelaModal("Essa categoria possui produstos cadastrados, primeiro apague os produtos desta
		 categoria para depois remover a mesma!!");

		 Rotas::Redirecionar(5, Rotas::pag_CategoriasADM());
	}
}



$smarty->assign('CATEGORIAS', $categorias->GetItens());

$smarty->display('adm_categorias.tpl');

?>
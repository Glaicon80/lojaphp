<?php 

$smarty = new Template();
$gravar = new Produtos();

if(isset($_POST['pro_apagar']) && isset($_POST['pro_id_apagar']) && $_POST['pro_apagar'] == 'SIM'){
	if($gravar->Apagar($_POST['pro_id_apagar'])){
		echo '<div class="alert alert-success">Produto Excluido com Sucesso!!</div>';
		@unlink($_POST['pro_img_arquivo']); // unlink — Apaga um arquivo    'pro_img_arquivo é o caminho ate a imagem
		Rotas::Redirecionar(2, Rotas::pag_ProdutosADM());  // vai para pag de produtos do administrador
		exit(); //coloquemos o exit para ele nao continuar a execução abaixo
	}else{
		echo '<div class="alert alert-danger">O produto não pode ser excluido!!</div>';
	}
}


else if(isset($_POST['pro_nome']) && isset($_POST['pro_valor'])){
	$pro_nome      = $_POST['pro_nome'];
    $pro_categoria = $_POST['pro_categoria'];
    $pro_ativo     = $_POST['pro_ativo'];
    $pro_modelo    = $_POST['pro_modelo'];
    $pro_ref       = $_POST['pro_ref'];
    $pro_valor     = $_POST['pro_valor'];
	$pro_promocao     = $_POST['pro_promocao'];
    $pro_estoque     = $_POST['pro_estoque'];
	$pro_stq_min     = $_POST['pro_stq_min'];
    $pro_peso      = $_POST['pro_peso'];
    $pro_altura    = $_POST['pro_altura'];
    $pro_largura  = $_POST['pro_largura'];
    $pro_comprimento  = $_POST['pro_comprimento'];
    $pro_img          = $_FILES['pro_img']['name'];
    $pro_desc         = $_POST['pro_desc'];
    $pro_id    = $_POST['pro_id'];
    $pro_img_arquivo = $_POST['pro_img_arquivo']; //   C:/xampp/htdocs/lojaphp/media/images/nome da imagem



    if(!empty($_FILES['pro_img']['name'])){ // se o arquivo não estiver vazio (se não foi selecionado nem uma imagem) ... se file não estiver vazio vai entrar aqui
    	$upload = new ImageUpload();
    	if($upload->Upload(900, 'pro_img')){ // vai fazer o upload no tamanho da imagem 900 pixel , passamos o campo da imagem
    		$pro_img = $upload->retorno; // passamos o nome da imagem (com data e slug incluso)
    		@unlink($pro_img_arquivo); // unlink — Apaga um arquivo    'pro_img_arquivo é o caminho ate a imagem antiga
    	}else{
    		exit('Erro ao enviar a imagem');
    	}
    }else{
    		$pro_img = $_POST['pro_img_atual']; // pega o nome da imagem atual
   }



   

    $gravar->Preparar($pro_nome, $pro_categoria, $pro_ativo, $pro_modelo, $pro_ref, $pro_valor,$pro_promocao, $pro_estoque,  $pro_stq_min , $pro_peso, $pro_altura, $pro_largura, $pro_comprimento, $pro_img, $pro_desc);


    if($gravar->Alterar($pro_id)){

	    Sistema::janelaModal("Produto Editato com Sucesso!!");
    	//echo '<div class="alert alert-success">Produto Editato com Sucesso!!</div>';
    	Rotas::Redirecionar(2, Rotas::pag_ProdutosADM());
    }else{

		Sistema::janelaModal("Produto não Editado!!");
    	//echo '<div class="alert alert-danger">Produto não Editado!!';
    	//Sistema::VoltarPagina();
		Rotas::Redirecionar(2, Rotas::pag_ProdutosADM());
    	//echo '</div>';
    	//exit();
    }



}else{





$categorias = new Categorias();
$categorias->GetCategorias();


//pegar o id dos produtos
$produtos = new Produtos();

if(isset($_POST['pro_id'])){

$id = $_POST['pro_id'];
$produtos->GetProdutosID($id);

$smarty->assign('CATEGORIAS', $categorias->GetItens());
$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
$smarty->assign('PRO', $produtos->GetItens());

$smarty->display('adm_produtos_editar.tpl');

}else{

	Sistema::janelaModal("Selecione um produto para editar");
	Rotas::Redirecionar(2, Rotas::pag_ProdutosADM());
}


}


?>
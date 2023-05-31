<?php 

$smarty = new Template();

if(isset($_POST['pro_nome']) && isset($_POST['pro_valor'])){
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
   


    if(!empty($_FILES['pro_img']['name'])){ // empty Verifique se uma variável está vazia (verfica se foi inserido a imagem no formulario)... se file não estiver vazio vai entrar aqui
    	$upload = new ImageUpload();
    	if($upload->Upload(900, 'pro_img')){ // 900 é a largura (tamanho 900 pixel) que definimos para as imagens, pro_img é a coluna do bando onde vai ser salvo o retorno abaixo. Aqui já vai salvar a imagem na pasta definida (a função Upload retorna true ou false)
    		$pro_img = $upload->retorno; // aqui vai ser o nome da imagem.extensão (no banco salvamos apenas o nome da imagem.extensao)
    	}else{
    		exit('Erro ao enviar a imagem');
    	}
    }



    $gravar = new Produtos();

    $gravar->Preparar($pro_nome, $pro_categoria, $pro_ativo, $pro_modelo, $pro_ref, $pro_valor, $pro_promocao, $pro_estoque, $pro_stq_min , $pro_peso, $pro_altura, $pro_largura, $pro_comprimento, $pro_img, $pro_desc);


    if($gravar->Inserir()){

        Sistema::janelaModal("Produto Cadastrado com Sucesso!!");
    	//echo '<div class="alert alert-success">Produto Cadastrado com Sucesso!!</div>';
    	Rotas::Redirecionar(2, Rotas::pag_ProdutosADM()); // vai para pag de produtos do administrador
    }else{

        Sistema::janelaModal("Produto não cadastrado!!");
    	//echo '<div class="alert alert-danger">Produto não cadastrado!!';
        Rotas::Redirecionar(2, Rotas::pag_ProdutosNovoADM());
    	//Sistema::VoltarPagina();  // vai voltar para o cadastro
    	//echo '</div>';
    	//exit();
    }



}else{


$categorias = new Categorias();
$categorias->GetCategorias();

$smarty->assign('CATEGORIAS', $categorias->GetItens());
$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA()); // http://localhost/lojaphp/view

$smarty->display('adm_produtos_novo.tpl');
}
?>
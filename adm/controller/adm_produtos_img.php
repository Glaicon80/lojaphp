<?php 





if(isset($_POST['pro_id']) && isset($_FILES['pro_img']['name'])){

		$upload = new ImageUpload();
    	
    	if(!empty($_FILES['pro_img']['name'])){
    	
	    	$upload->Upload(900, 'pro_img');
	    	$pro_img = $upload->retorno;

	    	$gravar = new ProdutosImages();
			$gravar->Insert($pro_img, $_POST['pro_id']);

			carregarTemplate($_POST['pro_id']);

    	}
	}

elseif(isset($_POST['fotos_apagar'])){ // se foi selecionado um chec box e clicado no botao apagar vai existi o post
	$apagar = new ProdutosImages();
	foreach ($_POST['fotos_apagar'] as $foto){ // aqui vai ser passado o nome da imagem, e sabemos que o nome da imagem é unico , nunca vai ter dois nomes iguais
		$apagar->Deletar($foto);
		$filename = Rotas::get_SiteRAIZ().'/'.Rotas::get_ImagePasta() .$foto; //   C:/xampp/htdocs/lojaphp/media/images/nomedafoto
		@unlink($filename); // vai deletar a imagem da pasta
	}

	carregarTemplate($_POST['pro_id']);

	//echo '<div class="alert alert-success">Foto(s) apagada(s) com sucesso! </div>';

}elseif(isset($_POST['pro_id'])){


	carregarTemplate($_POST['pro_id']);


}else{


Sistema::janelaModal("Selecione um produto");

Rotas::Redirecionar(2, Rotas::pag_ProdutosADM());


}



function carregarTemplate($id){

	$smarty = new Template();

	$img = new ProdutosImages();
	$img->GetImagesPRO($id);
	
	$smarty->assign('IMAGES', $img->GetItens());
	$smarty->assign('PRO', $id);

	$smarty->display('adm_produtos_img.tpl');


}


?>
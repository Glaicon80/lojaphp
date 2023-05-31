
<?php 

$smart = new Template();

$vendas = new Vendas();


if(isset($_POST['apagar'])){


	echo '<script>';
	echo   '$(document).ready(function(){';
	echo   '$("#modalExemplo").modal()';
	echo   '})';
	echo '</script>';

	 echo '<script>';
     echo '$(document).ready(function(){';
	 echo '$("#alertaMensagem2").val('.$_POST['apagarId'].')';
     echo'})';
     echo'</script>';

	 }


	if(isset($_POST['deletar'])){

	if($vendas->Apagar($_POST['alertaMensagem2'])){
		
		Sistema::janelaModal("Item Excluido com Sucesso!!");
        $vendas->GetItensVendas();
        $smart->assign('VENDAS',$vendas->ordemDescresente());
		Rotas::Redirecionar(2, Rotas::pag_VendasADM());  
	
	}else{

		Sistema::janelaModal("O produto não pode ser excluido!!");
        $vendas->GetItensVendas();
        $smart->assign('VENDAS',$vendas->ordemDescresente());
		Rotas::Redirecionar(2, Rotas::pag_VendasADM()); 
		
	}

}elseif(isset($_POST['decrescente'])){

$vendas->GetItensVendas();

$smart->assign('VENDAS',$vendas->ordemDescresente());

}elseif(isset($_POST['crescente'])){
  
$vendas->GetItensVendas();

$smart->assign('VENDAS',$vendas->ordemCrescente());
       
}elseif(isset($_POST['data_ini']) and isset($_POST['data_fim'])){

    $vendas->GetItensVendas($_POST['data_ini'], $_POST['data_fim']);
    $smart->assign('VENDAS',$vendas->ordemDescresente());
}

else{
    $vendas->GetItensVendas();
    $smart->assign('VENDAS',$vendas->ordemDescresente()); //vai retornar em ordem descrecente de vendas
}


$smart->display('vendas.tpl');

?>
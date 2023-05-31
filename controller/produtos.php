
<?php 

$smart = new Template();

$produtos = new Produtos();

 //isset quer dizer -- se existir o parametro na url

    if(isset(Rotas::$pag[1]) && !isset($_POST['txt_buscar'])){ 
        $produtos->GetProdutosCateID(Rotas::$pag[1]);
    }elseif(isset($_POST['txt_buscar']) && isset(Rotas::$pag[1])){
        
                    $nome = filter_var($_POST['txt_buscar'], FILTER_SANITIZE_STRING);
                    $produtos->GetProdutosNome($nome);
        
    }elseif(isset($_POST['txt_buscar'])){
        
        $nome = filter_var($_POST['txt_buscar'], FILTER_SANITIZE_STRING);
        $produtos->GetProdutosNome($nome);

}else{
    
        $produtos->GetProdutos();
    }


$smart->assign('PRO',$produtos->GetItens());
$smart->assign('PRO_INFO',Rotas::pag_ProdutosInfo());
$smart->assign('PRO_TOTAL',$produtos->TotalDados());
$smart->assign('PAGINAS',$produtos->ShowPaginacao());
$smart->assign('PRODUTOS', Rotas::pag_Produtos());

$smart->display('produtos.tpl');

?>
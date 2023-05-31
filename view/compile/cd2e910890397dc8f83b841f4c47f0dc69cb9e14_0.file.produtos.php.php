<?php
/* Smarty version 3.1.39, created on 2021-05-08 01:07:25
  from 'C:\xampp\htdocs\lojaphp2\controller\produtos.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60960e7d303631_10032764',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd2e910890397dc8f83b841f4c47f0dc69cb9e14' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\controller\\produtos.php',
      1 => 1617935283,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60960e7d303631_10032764 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php 

';?>
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

<?php echo '?>';
}
}

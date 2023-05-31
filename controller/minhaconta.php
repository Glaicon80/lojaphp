<?php 

$smarty = new Template();

Login::MenuCliente(); // se estiver logado ele vai para menu_cliente.tpl se não esiver logado vai redirecionado para login.php para logar

$smarty->assign('USER', $_SESSION['CLI']['cli_nome']);
$smarty->display('minha_conta.tpl'); // se estiver logado tbm vai abrir minha conta tpl

 ?>
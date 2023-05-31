<?php 

$smarty = new Template();

$login = new Login();

if(isset($_POST['txt_email']) && isset($_POST['txt_senha'])){ // se existi algo vindo do input email e do input senha pelo metodo post 
	
	$user = $_POST['txt_email'];
	$senha = $_POST['txt_senha'];
	$login->GetLogin($user, $senha);
}

	

$smarty->assign('USER', ''); // se não estiver logado USER vai ser vazio, fazendo isso para não dar erro

 if(Login::Logado()){ // se ele estiver logado (só vai estar logado se a sessao cliente $_SESSION['CLI'] existi)
	
	Login::MenuCliente();

$smarty->assign('USER', $_SESSION['CLI']['cli_nome']);
$smarty->display('minha_conta.tpl');
} 


$smarty->assign('LOGADO', Login::Logado());
$smarty->assign('PAG_LOGIN', Rotas::pag_ClienteLogin());
$smarty->assign('PAG_CADASTRO', Rotas::pag_ClienteCadastro()); //vai chamar a pagina de cadastro
$smarty->assign('PAG_RECOVERY', Rotas::pag_ClienteRecovery()); // aqui vai chamar a pagina de recuperar senha


$smarty->display('login.tpl');


?>
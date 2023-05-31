<?php 

$smarty = new Template();

Login::MenuCliente();


if(isset($_POST['cli_senha_atual']) and isset($_POST['cli_senha'])){
	$senha_atual = md5($_POST['cli_senha_atual']);
	$senha_nova = $_POST['cli_senha'];
	$email = $_SESSION['CLI']['cli_email'];

	if($senha_atual != $_SESSION['CLI']['cli_pass']){
		//echo'<div class="alert alert-danger"> A senha atual está incorreta</div>';
		//Rotas::Redirecionar(2, Rotas::pag_CLienteSenha());
		//exit();

		Sistema::janelaModal('A senha atual está incorreta');
		$smarty->display('cliente_senha.tpl');

	}else{

	$clientes = new Clientes();
	$clientes->SenhaUpdate($senha_nova, $email);
	//echo'<div class="alert alert-success"> A senha foi alterada com sucesso, faça login com a nova senha!!</div>';
	
	//Rotas::Redirecionar(3, Rotas::pag_Logoff());


	//echo '<script> alert("A senha foi alterada com sucesso"); </script>';
	Sistema::janelaModal("A senha foi alterada com sucesso");
	$login = new Login();
    $login->GetLogin($email, $senha_nova, "alterar"); //fazemos o login automatico para que atualize todos os dados da sessão cliente principalmente com a nova senha
    
}
}else{
	$smarty->display('cliente_senha.tpl');
}




 ?>
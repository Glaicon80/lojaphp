<?php 

$smarty = new Template();


$cliente = new Clientes();

if(isset($_POST['cli_email'])){

	if(!filter_var($_POST['cli_email'], FILTER_VALIDATE_EMAIL)){  // FILTER_VALIDATE_EMAIL Verifique se a variável $ email é um endereço de e-mail válido (com @ , final .com) e filter_var vai retornar false para email invalidos

		Sistema::janelaModal('Email incorreto');
		$smarty->display('clientes_recovery.tpl');

	}else{
	$cliente->setCli_email($_POST['cli_email']);

	if($cliente->GetClienteEmail($cliente->getCli_email()) > 0){
		$novasenha = Sistema::GerarSenha();

		$cliente->SenhaUpdate($novasenha, $cliente->getCli_email());

		//enviar o email para o cliente
		$email = new EnviarEmail();
     	$assunto = 'Nova Senha - ' . Config::SITE_NOME;
     	$msg = "Olá cliente, uma nova senha foi solicitada por você, acesse o site: " . '<a href='.Rotas::pag_ClienteConta().'>'.Rotas::pag_ClienteConta().'</a>' ;
     	$msg .= "<br> Nova Senha =  " . $novasenha;
	 	$destinatarios = array($cliente->getCli_email(), Config::SITE_EMAIL_ADM);
     	$email->Enviar($assunto, $msg, $destinatarios);

		Sistema::janelaModal('Olá, foi enviada uma nova senha para seu email de cadastro!!');
     //	echo'<div class="alert alert-success"> <p>Olá, foi enviada uma nova senha para acesso ao site em seu email de cadastro!!</p></div>';
     	Rotas::Redirecionar(5, Rotas::pag_ClienteLogin());


	}else{

		Sistema::janelaModal('Este email não está cadastrado na loja!');
		$smarty->display('clientes_recovery.tpl');

		//echo'<div class="alert alert-danger"> <p>Este email não está cadastrado na loja!</p></div>';
		//Rotas::Redirecionar(2, Rotas::pag_ClienteRecovery());
	}

}

}else{
	$smarty->display('clientes_recovery.tpl');
}




 ?>
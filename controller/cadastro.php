<?php 

$smarty = new Template();


if(isset($_POST['cli_nome']) and isset($_POST['cli_email']) and isset($_POST['cli_cpf'])){
	//variaveis
	 $cli_nome = $_POST['cli_nome'];
	 $cli_sobrenome = $_POST['cli_sobrenome'];
     $cli_data_nasc = $_POST['cli_data_nasc'];
     $cli_rg        = $_POST['cli_rg'];
     $cli_cpf       = $_POST['cli_cpf'];
     $cli_ddd       = $_POST['cli_ddd'];
     $cli_fone      = $_POST['cli_fone'];
     $cli_celular   = $_POST['cli_celular'];
     $cli_endereco  = $_POST['cli_endereco'];
     $cli_numero    = $_POST['cli_numero'];
     $cli_bairro    = $_POST['cli_bairro'];
     $cli_cidade    = $_POST['cli_cidade'];
     $cli_uf        = $_POST['cli_uf'];
     $cli_cep       = $_POST['cli_cep'];
     $cli_email     = $_POST['cli_email'];
     $cli_senha     = Sistema::GerarSenha();
     $cli_data_cad  = Sistema::DataAtualUS();
     $cli_hora_cad  = Sistema::HoraAtual();


     $smarty->assign('NOME', $cli_nome);
     $smarty->assign('SOBRENOME', $cli_sobrenome);
     $smarty->assign('DATA', $cli_data_nasc);
     $smarty->assign('RG', $cli_rg);
     $smarty->assign('CPF', $cli_cpf);
     $smarty->assign('DDD', $cli_ddd);
     $smarty->assign('FONE', $cli_fone);
     $smarty->assign('CELULAR', $cli_celular);
     $smarty->assign('ENDERECO', $cli_endereco);
     $smarty->assign('NUMERO', $cli_numero);
     $smarty->assign('BAIRRO', $cli_bairro);
     $smarty->assign('CIDADE', $cli_cidade);
     $smarty->assign('UF', $cli_uf);
     $smarty->assign('CEP', $cli_cep);
     $smarty->assign('EMAIL', $cli_email);

     
     // os else if são para fazer a validação, mas o formulario já esta fazendo isso, nunca vai entrar nessas condições

     if(strlen($cli_nome) < 3){ //strlen — Retorna o tamanho de uma string

          Sistema::janelaModal('Digite 3 ou mais caracteres no nome');
          $smarty->display('cadastro.tpl');

     }else if(strlen($cli_sobrenome) < 3){    
          
          Sistema::janelaModal('Digite 3 ou mais caracteres no sobrenome');
          $smarty->display('cadastro.tpl');

     }else if(strlen($cli_cpf) != 11){    
          
          Sistema::janelaModal('CPF incorreto, digite apenas números com 11 dígitos!!');
          $smarty->display('cadastro.tpl');     

     }else if(strlen($cli_ddd) != 2){  

          Sistema::janelaModal('DDD incorreto');
          $smarty->display('cadastro.tpl');
     
     }else if(strlen($cli_cep) != 8){  
          
          Sistema::janelaModal('CEP incorreto, digite apenas números com 8 dígitos!!');
          $smarty->display('cadastro.tpl');

     }else if(!filter_var($cli_email, FILTER_VALIDATE_EMAIL)){  

          Sistema::janelaModal('Email incorreto');
          $smarty->display('cadastro.tpl');


     }else if(strlen($cli_uf) != 2){  

          Sistema::janelaModal('UF incorreto');
          $smarty->display('cadastro.tpl');
    
     }else{

      $clientes = new Clientes();

          //ultima validação, se existe email já cadasdastrado no banco, pois não pode ter email cadastrado no banco
     if($clientes->GetClienteEmail($cli_email) > 0){     

          Sistema::janelaModal('Este Email já esta cadastrado');
          $smarty->display('cadastro.tpl');
     
     }else if($clientes->GetClienteCPF($cli_cpf) > 0){

          Sistema::janelaModal('Este CPF já esta cadastrado');
          $smarty->display('cadastro.tpl');

     }else{

     

     $clientes->Preparar($cli_nome, $cli_sobrenome, $cli_data_nasc, $cli_rg, $cli_cpf, $cli_ddd, $cli_fone, $cli_celular, $cli_endereco, $cli_numero, $cli_bairro, $cli_cidade, $cli_uf, $cli_cep, $cli_email, $cli_data_cad, $cli_hora_cad, $cli_senha);


     $clientes->Inserir();


     //ASSIGNS PARA TEMPLATE
     $smarty->assign('NOME', $cli_nome);
     $smarty->assign('SITE', Config::SITE_NOME);
     $smarty->assign('EMAIL', $cli_email);
     $smarty->assign('SENHA', $cli_senha);
     $smarty->assign('PAG_MINHA_CONTA', Rotas::pag_ClienteConta());
     $smarty->assign('SITE_HOME', Rotas::get_SiteHOME());

     $email = new EnviarEmail();
     $assunto = 'Cadastro Efetuado - ' . Config::SITE_NOME;
     $msg = $smarty->fetch('email_cliente_cadastro.tpl');
	 $destinatarios = array($cli_email, Config::SITE_EMAIL_ADM);
     $email->Enviar($assunto, $msg, $destinatarios);

     Sistema::janelaModal('Cadastro Efetuado!! A senha para fazer login foi enviada para seu email cadastrado. ' . 'Acesse seu email e confira!');
     Rotas::Redirecionar(5, Rotas::pag_ClienteLogin());
     }
     }

}else{

     $smarty->assign('NOME', "");
     $smarty->assign('SOBRENOME', "");
     $smarty->assign('DATA', "");
     $smarty->assign('RG', "");
     $smarty->assign('CPF', "");
     $smarty->assign('DDD', "");
     $smarty->assign('FONE', "");
     $smarty->assign('CELULAR', "");
     $smarty->assign('ENDERECO', "");
     $smarty->assign('NUMERO', "");
     $smarty->assign('BAIRRO', "");
     $smarty->assign('CIDADE', "");
     $smarty->assign('UF', "");
     $smarty->assign('CEP', "");
     $smarty->assign('EMAIL', "");

	$smarty->display('cadastro.tpl');

}

 ?>
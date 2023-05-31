<?php 

$smarty = new Template();

Login::MenuCliente();

foreach($_SESSION['CLI'] as $campo => $valor){
     	$smarty->assign(strtoupper($campo), $valor); //strtoupper Converte uma string para maiúsculas
     }

     

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
     $cli_senha     = $_POST['cli_senha'];
     $cli_data_cad  = $_SESSION['CLI']['cli_data_cad']; ///não vai aparecer no formulario  mais vai ser salvo de novo
     $cli_hora_cad  = $_SESSION['CLI']['cli_hora_cad']; //não vai aparecer no formulario  mais vai ser salvo de novo

     if($_SESSION['CLI']['cli_pass'] != md5($cli_senha)){

          Sistema::janelaModal('A senha para confirmar a alteração está incorreta'); //codigo javascript que vai abrir janela modal de index.tpl, só que ela desaparece só se clicar no botao
         
         $smarty->display('cliente_dados.tpl');

     }
     
     // os else if são para fazer a validação, mas o formulario já esta fazendo isso, nunca vai entrar nessas condições

     else if(strlen($cli_nome) < 3){ //strlen — Retorna o tamanho de uma string

          Sistema::janelaModal('Digite 3 ou mais caracteres no nome');
          $smarty->display('cliente_dados.tpl');

     }else if(strlen($cli_sobrenome) < 3){    
          
          Sistema::janelaModal('Digite 3 ou mais caracteres no sobrenome');
          $smarty->display('cliente_dados.tpl');

     }else if(strlen($cli_ddd) != 2){  

          Sistema::janelaModal('DDD incorreto');
          $smarty->display('cliente_dados.tpl');
     
     }else if(strlen($cli_cep) != 8){  
          
          Sistema::janelaModal('CEP incorreto, digite apenas números com 8 dígitos!!');
          $smarty->display('cliente_dados.tpl');

     }else if(!filter_var($cli_email, FILTER_VALIDATE_EMAIL)){  

          Sistema::janelaModal('Email incorreto');
          $smarty->display('cliente_dados.tpl');


     }else if(strlen($cli_uf) != 2){  

          Sistema::janelaModal('UF incorreto');
          $smarty->display('cliente_dados.tpl');
    
     }else{

     // se toda validação estiver correta vai cair aqui.

     $clientes = new Clientes();

     //ultima validação, se existe email já cadasdastrado no banco, pois não pode ter email cadastrado no banco
     if($clientes->GetClienteEmail($cli_email) > 0 && $cli_email != $_SESSION['CLI']['cli_email']){     

          Sistema::janelaModal('Este Email já esta cadastrado');
          $smarty->display('cliente_dados.tpl');
     
     }else{
     $clientes->Preparar($cli_nome, $cli_sobrenome, $cli_data_nasc, $cli_rg, $cli_cpf, $cli_ddd, $cli_fone, $cli_celular, $cli_endereco, $cli_numero, $cli_bairro, $cli_cidade, $cli_uf, $cli_cep, $cli_email, $cli_data_cad, $cli_hora_cad, $cli_senha);

     if(!$clientes->Editar($_SESSION['CLI']['cli_id'])){

          Sistema::janelaModal('Ocorreu um erro ao editar os dados');
     	
     		exit();
     }else{

          Sistema::janelaModal('Dados alterados com sucesso!');

     	$login = new Login();
     	$login->GetLogin($cli_email, $cli_senha,"alterar"); // fazemos o login automatico para que atualize a sessão cliente com os novos dados, senao pode dar problema
     }
}
}

}
else{
	$smarty->display('cliente_dados.tpl');

}




 ?>
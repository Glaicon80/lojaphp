<?php 

$smarty = new Template();


$clientes = new Clientes();


     

if(isset($_POST['cli_nome']) and isset($_POST['cli_email']) and isset($_POST['cli_cpf'])){
	//variaveis
	 $cli_id = $_POST['cli_id'];
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
     $cli_senha     = ""; // essas tres variaveis o adm não vai interferir
     $cli_data_cad  = "";  // no UPDATE dentro de EditarADM não é colocado  senha, data de cadastro e hora de cadastro
     $cli_hora_cad  = "";


     if(strlen($cli_nome) < 3){ //strlen — Retorna o tamanho de uma string

          Sistema::janelaModal('Digite 3 ou mais caracteres no nome');
          validar($cli_id);

     }else if(strlen($cli_sobrenome) < 3){    
          
          Sistema::janelaModal('Digite 3 ou mais caracteres no sobrenome');
          validar($cli_id);

     }else if(strlen($cli_ddd) != 2){  

          Sistema::janelaModal('DDD incorreto');
          validar($cli_id);
     
     }else if(strlen($cli_cep) != 8){  
          
          Sistema::janelaModal('CEP incorreto, digite apenas números com 8 dígitos!!');
          validar($cli_id);

     }else if(!filter_var($cli_email, FILTER_VALIDATE_EMAIL)){  

          Sistema::janelaModal('Email incorreto');
          validar($cli_id);


     }else if(strlen($cli_uf) != 2){  

          Sistema::janelaModal('UF incorreto');
          validar($cli_id);
    
     }else{

     // se toda validação estiver correta vai cair aqui.

     $clientes = new Clientes();

     $clientes->GetClientesID($cli_id);
     $cpf = $clientes->GetItens()[1]['cli_cpf'];
     $email = $clientes->GetItens()[1]['cli_email'];

     //ultima validação, se existe email já cadasdastrado no banco, pois não pode ter email cadastrado no banco
     if($clientes->GetClienteEmail($cli_email) > 0 && $cli_email != $email){     

          Sistema::janelaModal('Este Email já esta cadastrado');
          validar($cli_id);
     
     }elseif($clientes->GetClienteCPF($cli_cpf) > 0 && $cli_cpf != $cpf){     

          Sistema::janelaModal('Este CPF já esta cadastrado');
          validar($cli_id);
     
     }
     
     
     else{

          $clientes->Preparar($cli_nome, $cli_sobrenome, $cli_data_nasc, $cli_rg, $cli_cpf, $cli_ddd, $cli_fone, $cli_celular, $cli_endereco, $cli_numero, $cli_bairro, $cli_cidade, $cli_uf, $cli_cep, $cli_email, $cli_data_cad, $cli_hora_cad, $cli_senha);

    
          if(!$clientes->EditarADM($cli_id)){

               Sistema::janelaModal('Ocorreu um erro ao editar os dados');
               validar($cli_id);
              
          }else{
               
               Sistema::janelaModal('Dados atualizados com sucesso!');
               validar($cli_id);
              
             
              // Rotas::Redirecionar(1, Rotas::pag_ClientesADM());
     
               
          }
    
     }


}

}

else{
	
     validar(Rotas::$pag[1]);


}


function validar($id){

     $smarty = new Template();
     $clientes = new Clientes();

     $clientes->GetClientesID($id);
	foreach($clientes->GetItens()[1] as $campo => $valor){

		$smarty->assign(strtoupper($campo), $valor); // strtoupper vai colocar todas as letras em maiusculo, isso nao é obrigatorio
	}


	$smarty->display('adm_clientes_editar.tpl');

}


 ?>
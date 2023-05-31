<?php 

date_default_timezone_set('America/Sao_Paulo');

if(!isset($_SESSION)){ // se não existe uma sessao entao iniciemos uma
	session_start();
	
}


require '../lib/autoload.php'; // em index.php e login.php não receberam o tratatamento das paginas que estão na pasta controller
                               // desta forma para essas duas paginas seja encontradas no caminho da url temos que chamar a lib/autoload
$smarty = new Template();      // neste caso como essas duas paginas  estao dentro de adm vamos voltar uma pagina com os (..)


if(isset($_POST['recovery'])){
    
 
    // obejto USER
    $user = new User();
   // passo alguns valores
    $email = $_POST['txt_email'];
    $senha = Sistema::GerarSenha();
    // verifico se tem este email na tabela 
    if($user->GetUserEmail($email) > 0):
        
        // faz alteração 
        $user->AlterarSenha($senha, $email);  
        
          // apos alterar envia email com a nova senha
         $enviar = new EnviarEmail();
         
         $assunto = 'Nova senha ADM do site '. Sistema::DataAtualBR();
         $destinatarios = array($email,  Config::SITE_EMAIL_ADM);
         $msg = ' Nova senha no ADM do site, nova senha:  ' .$senha;
         
         
         $enviar->Enviar($assunto, $msg, $destinatarios);

         //tive que colocar esse comando pois se não , nao ia chamar a modal, pq a modal esta dentro do tpl
         $smarty->assign('HOME', Rotas::get_SiteHOME());  // http://localhost/lojaphp
         $smarty->assign('TEMA', Rotas::get_SiteTEMA());
         $smarty->display('adm_login.tpl');

         modalAlert("Foi enviado um email com a NOVA SENHA");
         
         
    else:

      //tive que colocar esse comando pois se não , nao ia chamar a modal, pq a modal esta dentro do tpl
      $smarty->assign('HOME', Rotas::get_SiteHOME());  // http://localhost/lojaphp
      $smarty->assign('TEMA', Rotas::get_SiteTEMA());
      $smarty->display('adm_login.tpl');
        
      modalAlert("Email não encontrado");

    endif;


}

else if(isset($_POST['txt_logar']) && isset($_POST['txt_email'])){
	$user = $_POST['txt_email'];
	$senha = $_POST['txt_senha'];
	$login = new Login();
  
	if($login->GetLoginADM($user, $senha)){
		
		Rotas::Redirecionar(0, 'index.php');
		exit();
	}else{

    //tive que colocar esse comando pois se não , nao ia chamar a modal, pq a modal esta dentro do tpl
    $smarty->display('adm_login.tpl');

    modalAlert("login incorreto");

    Rotas::Redirecionar(2, 'login.php');
  }
}else{



$smarty->assign('HOME', Rotas::get_SiteHOME());  // http://localhost/lojaphp
$smarty->assign('TEMA', Rotas::get_SiteTEMA());
$smarty->display('adm_login.tpl');

}



// função que chama a modal
function modalAlert($texto){

  echo '<input type="hidden" id="itexto2" value="'.$texto.'">';
         
  echo '<script>';
   echo   '$(document).ready(function(){';
   echo   '$("#modalAlerta2").modal()';
   echo   '})';
   echo '</script>';

   echo '<script>';
   echo '$(document).ready(function(){';
   echo '$("#alertaMensagem2").text($("#itexto2").val())';
   echo'})';
   echo'</script>';

}

?>



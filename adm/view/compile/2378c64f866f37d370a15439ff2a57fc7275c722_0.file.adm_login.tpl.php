<?php
/* Smarty version 3.1.39, created on 2021-05-10 18:12:57
  from 'C:\xampp\htdocs\lojaphp2\adm\view\adm_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6099a1d90501f4_81372380',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2378c64f866f37d370a15439ff2a57fc7275c722' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\adm\\view\\adm_login.tpl',
      1 => 1620681151,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6099a1d90501f4_81372380 (Smarty_Internal_Template $_smarty_tpl) {
?><style>


.thumbnail{

border-radius: 15px;
box-shadow: 6px 6px 10px #adadad;
}

#bloco_login_adm{
  background-color: #fff;
  border-radius: 15px;
  margin: 20px;
  padding: 30px;

 }


</style>


<!DOCTYPE html>

<html>  <!-- aqui vai ter que ter o  head com os css e js pois ela não vai ficar dentro de index.tpl -->
    <head>
        <title>Area restrita </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['TEMA']->value;?>
/tema/js/jquery.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" >
        <!-- meu aquivo pessoal de CSS-->
       
     
    
    </head>
    <body style="background-color: #d7dcf8">
        
        <section class="container" >
            
            
            <section class="row">
                
                <div class="col-md-4"></div>    
               
                <div class="col-md-4 thumbnail" id="bloco_login_adm">
                 
                    <h4 class="text-center"> Área restrita </h4>
               
                    
                    <form name="login" method="post" action="">
                        
                        <label>Email:</label>
                        <input type="email" name="txt_email" class="form-control" required autocomplete="off">
                        
                        
                        <label>Senha:</label>
                        <input type="password" name="txt_senha" class="form-control" required>
                        
                        <br>
                        <br>
                        <button class="btn btn-success btn-block btn-lg" name="txt_logar" value="txt_logar"> Entrar </button>
                        <br>
                        
                          
                        
                    </form>
                    
                    <!-- botão senha recovery -->
            
                    <center><button class="btn btn-warning" data-toggle="collapse" data-target="#recovery"> Esqueci a senha </button>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['HOME']->value;?>
" class="btn btn-info"> Ir para Loja </a>
                    </center>
                    
                    <br>
                    <div class="alert alert-danger collapse" id="recovery">
                    
                        <form name="recovery" method="post" action="">
                            <label>Digite o email do administrador </label>
                            <input type="email" name="txt_email" class="form-control" required>
                            <br>
                            <button class="btn btn-success" name="recovery" value="recovery">Solicitar senha</button>
                            
                        </form> 
                        
                    </div>
                    
                </div>    
              
                <div class="col-md-4"></div>    
                
                
            </section>
            
            
            
        </section>       
        
        
    </body>
</html>



     <!-- modal alerta-->
          <!-- overflow-y:scroll é para rolagem-->
          <div class="modal fade" id="modalAlerta2"  tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">

            <div class="modal-dialog">
  
            <div class="modal-content">
  
          <!-- agora que a div do modal começa, as anteriores eram para configurações-->
          <!-- modal-header é o cabeçaçho-->
          <div class="modal-header" style="padding: 35px 50px;">
  
              <h4 style="color: #448ed3;">Alerta</h4>
  
          </div>
  
          <!-- modal-body é o corpo-->
  
          <div class="modal-body" style="padding: 40px 50px;">
  
         <label id="alertaMensagem2">login incorreto</label>
  
          </div>
      
          <!-- rodape-->
  
          <div class="modal-footer">
                  
              <button type="button" class="btn btn-default"  onclick="goBack()" data-dismiss="modal">OK</button>
              
          </div>
  
      </div>
  
   </div>
  
  </div><?php }
}

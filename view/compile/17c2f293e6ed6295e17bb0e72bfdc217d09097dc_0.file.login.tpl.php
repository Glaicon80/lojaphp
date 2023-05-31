<?php
/* Smarty version 3.1.39, created on 2021-04-14 16:06:41
  from 'C:\xampp\htdocs\lojaphp2\view\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60773d41812406_70692283',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17c2f293e6ed6295e17bb0e72bfdc217d09097dc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\view\\login.tpl',
      1 => 1618427198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60773d41812406_70692283 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['LOGADO']->value == true) {?>


<?php } else { ?>

<style>

    
.thumbnail{

border-radius: 4px;
box-shadow: 0px 0px 6px #adadad;
}
</style>


<section class="container">

<section class="row" id="fazerlogin" >

   
    
        <div class="col-md-2 text-center" >
        
    
           
                
          
        
        </div>
     
        <!---  aqui estão os campos -->
        <div class="col-md-4 thumbnail" style="background-color: white; margin-top: 20px;margin-bottom: 20px;margin-left: 15px;margin-right: 15px; padding: 20px;" >
           
            <form name="cliente_login" method="post" action="" >
     
            <div class="form-group"> 
                <label></i> Email: </label>
                <input type="email"  class="form-control " name="txt_email" value="" placeholder="Digite seu email" required autocomplete="off">        

            </div>


            <div class="form-group"> 
                 <label> Senha: </label>
                 <input type="password"  class="form-control " name="txt_senha" value="" placeholder="Digite sua senha" required>        
           
            </div>


            <div class="form-group"> 
                
                <button type="submit" class="btn btn-geral btn-block btn-primary"><i class="fas fa-sign-in-alt"></i> Entrar </button>
                
            </div>
            <div class="form-group"> 
                
                <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CADASTRO']->value;?>
" class="btn btn-secondary btn-sm" style="width: 45%;"><i class="fas fa-pencil-alt"></i> Cadastrar</a>
             
                
                <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_RECOVERY']->value;?>
" class="btn btn-secondary btn-sm" style="width: 53%; margin-right: -10px;"><i class="fas fa-question"></i> Esqueci a Senha</a>
           
                
                
            </div>

        </form>
        </div><!-- fim dos campos -->


        <div class="col-md-6 text-center" > 
        
      
        </div>
    
    
    
    
</section>
</section>



<?php }
}
}

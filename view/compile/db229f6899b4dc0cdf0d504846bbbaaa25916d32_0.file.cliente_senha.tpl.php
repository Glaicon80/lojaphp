<?php
/* Smarty version 3.1.39, created on 2021-04-18 20:47:46
  from 'C:\xampp\htdocs\lojaphp2\view\cliente_senha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_607cc52269e422_54679698',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db229f6899b4dc0cdf0d504846bbbaaa25916d32' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\view\\cliente_senha.tpl',
      1 => 1618789662,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_607cc52269e422_54679698 (Smarty_Internal_Template $_smarty_tpl) {
?><br>
<br>


    
    <h4 class="text-left" style="margin-left: 15px;margin-bottom: -10px;">Alterar senha</h4>
    
    <hr style="margin-left: 15px; margin-right: 15px;">




<form name="alterarsenha" method="post" action="">
    
    <section class="row" style="margin-left: 0px; margin-right: 0px;">
        <div class="col-md-2"></div>
        
        <div class="col-md-4">
            <label>Digite sua senha atual</label>
          
            <input type="password" name="cli_senha_atual" id="cli_senha_atual" class="form-control" required>
          
           
            
            <label>Digite sua nova senha</label>
          
            <input type="password" name="cli_senha" id="cli_senha" class="form-control" required>
            <br>
           
            
            
            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-check"></i> Alterar </button>
        </div>
       
        <div class="col-md-6">
       
            
            
        </div>
        
        
        
    </section>  
    
</form>

<br><br>
<?php }
}

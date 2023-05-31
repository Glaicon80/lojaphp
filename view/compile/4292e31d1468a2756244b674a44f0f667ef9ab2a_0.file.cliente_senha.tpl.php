<?php
/* Smarty version 3.1.39, created on 2021-05-13 14:44:29
  from '/home1/meune445/loja.meunegocioweb.com/view/cliente_senha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_609d657d3690f4_49557993',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4292e31d1468a2756244b674a44f0f667ef9ab2a' => 
    array (
      0 => '/home1/meune445/loja.meunegocioweb.com/view/cliente_senha.tpl',
      1 => 1620863543,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609d657d3690f4_49557993 (Smarty_Internal_Template $_smarty_tpl) {
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

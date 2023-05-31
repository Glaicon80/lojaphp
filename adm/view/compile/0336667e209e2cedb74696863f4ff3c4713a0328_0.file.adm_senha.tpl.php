<?php
/* Smarty version 3.1.39, created on 2021-04-24 21:25:29
  from 'C:\xampp\htdocs\lojaphp2\adm\view\adm_senha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6084b6f9e74cb9_48433020',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0336667e209e2cedb74696863f4ff3c4713a0328' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\adm\\view\\adm_senha.tpl',
      1 => 1619310322,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6084b6f9e74cb9_48433020 (Smarty_Internal_Template $_smarty_tpl) {
?><br>
<br>


    
    <h4 class="text-left" style="margin-left: 15px;margin-bottom: -10px;">Alterar senha</h4>
    
    <hr style="margin-left: 15px; margin-right: 15px;">




<form name="alterarsenha" method="post" action="">
    
    <section class="row" style="margin-left: 0px; margin-right: 0px;">
        <div class="col-md-2"></div>
        
        <div class="col-md-4">
            <label>Digite sua senha atual</label>
          
            <input type="password" name="adm_senha_atual" id="adm_senha_atual" class="form-control" required>
          
           
            
            <label>Digite sua nova senha</label>
          
            <input type="password" name="adm_senha" id="adm_senha" class="form-control" required>
            <br>
           
            
            
            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-check"></i> Alterar </button>
        </div>
       
        <div class="col-md-6">
       
            
            
        </div>
        
        
        
    </section>  
    
</form>

<br><br><?php }
}

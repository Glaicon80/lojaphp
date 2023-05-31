<?php
/* Smarty version 3.1.39, created on 2021-04-18 20:44:56
  from 'C:\xampp\htdocs\lojaphp2\view\clientes_recovery.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_607cc478e71517_39719308',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a9703e8af2536e0edcbe91ca39cc1cebbdfd54b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\view\\clientes_recovery.tpl',
      1 => 1618789481,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_607cc478e71517_39719308 (Smarty_Internal_Template $_smarty_tpl) {
?><br>
<br>

    <h4 class="text-left" style="margin-left: 15px;margin-bottom: -10px;">Digite seu email cadastrado para receber uma nova senha</h4>
    
    <hr style="margin-left: 15px; margin-right: 15px;">


<form name="recuperarsenha" method="post" action="">
    
    <section class="row" style="margin-left: 0px; margin-right: 0px;">
        <div class="col-md-2"></div>
        
        <div class="col-md-4">
            <label>Digite seu email cadastrado</label>
          
            <input type="email" name="cli_email" id="cli_email" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-warning btn-block"><i class="fas fa-check"></i> Recuperar </button>
        </div>
       
        <div class="col-md-6">
       
            
            
        </div>
        
        
        
    </section>

  
    
</form>

<br>
<br>
<?php }
}

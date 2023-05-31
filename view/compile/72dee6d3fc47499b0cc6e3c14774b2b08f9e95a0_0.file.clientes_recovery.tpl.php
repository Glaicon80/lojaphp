<?php
/* Smarty version 3.1.39, created on 2021-05-13 14:47:01
  from '/home1/meune445/loja.meunegocioweb.com/view/clientes_recovery.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_609d6615eee294_89985955',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72dee6d3fc47499b0cc6e3c14774b2b08f9e95a0' => 
    array (
      0 => '/home1/meune445/loja.meunegocioweb.com/view/clientes_recovery.tpl',
      1 => 1620863541,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609d6615eee294_89985955 (Smarty_Internal_Template $_smarty_tpl) {
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

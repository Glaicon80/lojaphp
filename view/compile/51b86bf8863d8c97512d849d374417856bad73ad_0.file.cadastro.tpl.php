<?php
/* Smarty version 3.1.39, created on 2021-04-18 18:09:18
  from 'C:\xampp\htdocs\lojaphp2\view\cadastro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_607c9ffecd9099_63445412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51b86bf8863d8c97512d849d374417856bad73ad' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\view\\cadastro.tpl',
      1 => 1618780106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_607c9ffecd9099_63445412 (Smarty_Internal_Template $_smarty_tpl) {
?><br>
<br>


<h4 class="text-left" style="margin-left: 15px;margin-bottom: -10px;">Cadastro de cliente</h4>

<hr style="margin-left: 15px; margin-right: 15px;">


<form name="cadcliente" id="cadcliente" method="post" action="">

<section class="row" id="cadastro" style="margin-left: 0px; margin-right: 0px;"> 

  
    <div class="col-md-4 col-6">
        <label>Nome:</label>
        <input type="text" name="cli_nome" value="<?php echo $_smarty_tpl->tpl_vars['NOME']->value;?>
" class="form-control" minlength="3" required>
        
        
    </div>
    
    <div class="col-md-4 col-6">
        <label>Sobrenome:</label>
        <input type="text"  name="cli_sobrenome" value="<?php echo $_smarty_tpl->tpl_vars['SOBRENOME']->value;?>
" class="form-control"  minlength="3" required>
        
        
    </div>
    
  
    <div class="col-md-3">
        <label>Data Nasc:</label>
        <input type="date"  name="cli_data_nasc" value="<?php echo $_smarty_tpl->tpl_vars['DATA']->value;?>
" class="form-control" required>
        
        
    </div>
    
  
    <div class="col-md-2 col-6">
        <label>RG:</label>
        <input type="text"  name="cli_rg" value="<?php echo $_smarty_tpl->tpl_vars['RG']->value;?>
" class="form-control" required>
        
        
    </div>
    
  
    
    <div class="col-md-2 col-6">
        <label>CPF:</label>
        <input type="number"  name="cli_cpf" value="<?php echo $_smarty_tpl->tpl_vars['CPF']->value;?>
" class="form-control" required> 
        
        
    </div>
    
  
    
    <div class="col-md-2 col-4">
        <label>DDD:</label>
        <input type="number"  name="cli_ddd" value="<?php echo $_smarty_tpl->tpl_vars['DDD']->value;?>
" class="form-control"  min="10" max="99" required>
        
        
    </div>
    
  
    
    <div class="col-md-3 col-8">
        <label>Fone:</label>
        <input type="number" name="cli_fone" value="<?php echo $_smarty_tpl->tpl_vars['FONE']->value;?>
" class="form-control" required>
        
        
    </div>
    
  
    
    <div class="col-md-3">
        <label>Celular:</label>
        <input type="number" name="cli_celular" value="<?php echo $_smarty_tpl->tpl_vars['CELULAR']->value;?>
" class="form-control" required>
        
        
    </div>
            
    
    
    <div class="col-md-6">
        <label>Endereço:</label>
        <input type="text" name="cli_endereco" value="<?php echo $_smarty_tpl->tpl_vars['ENDERECO']->value;?>
" class="form-control"  minlength="3" required>
        
        
    </div>    
    
    
    <div class="col-md-2 col-4">
        <label>Numero:</label>
        <input type="text" name="cli_numero" value="<?php echo $_smarty_tpl->tpl_vars['NUMERO']->value;?>
" class="form-control" required>
        
        
    </div>
    
    
    <div class="col-md-4 col-8">
        <label>Bairro:</label>
        <input type="text" name="cli_bairro" value="<?php echo $_smarty_tpl->tpl_vars['BAIRRO']->value;?>
" class="form-control" minlength="3" required>
        
        
    </div>
    
    
    <div class="col-md-4 col-8">
        <label>Cidade:</label>
        <input type="text" name="cli_cidade" value="<?php echo $_smarty_tpl->tpl_vars['CIDADE']->value;?>
" class="form-control" minlength="3" required>
        
        
    </div>
    
    
    <div class="col-md-2 col-4">
        <label>UF:</label>
       
        <input type="text" name="cli_uf" value="<?php echo $_smarty_tpl->tpl_vars['UF']->value;?>
" class="form-control" maxlength="2" minlength="2" required>
        
        
    </div>
    
    
    <div class="col-md-2">
        <label>Cep:</label>
       
        <input type="number" name="cli_cep" value="<?php echo $_smarty_tpl->tpl_vars['CEP']->value;?>
" class="form-control" minlength="8" maxlength="8" required>
        
        
    </div>
    
    
    <div class="col-md-4">
        <label>Email:</label>
       
        <input type="email" name="cli_email" value="<?php echo $_smarty_tpl->tpl_vars['EMAIL']->value;?>
" class="form-control" required>
        
        
    </div>
 
    
       
    
</section>

      <br>
      <br>
      
      <section class="row" id="btngravar" style="margin-left: 0px; margin-right: 0px;">
          
       <div class="col-md-4"></div>
       
       <div class="col-md-4">
           <button type="submit" class="btn btn-info btn-block "><i class="far fa-edit"></i> Gravar </button>
               
           
       </div>
       
       <div class="col-md-4"></div>
    
    
</section>
      
      
         </form>

         <br><br><?php }
}

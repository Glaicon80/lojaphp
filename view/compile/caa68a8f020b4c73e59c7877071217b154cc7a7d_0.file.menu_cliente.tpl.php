<?php
/* Smarty version 3.1.39, created on 2021-04-14 21:22:41
  from 'C:\xampp\htdocs\lojaphp2\view\menu_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_607787510f3252_48962534',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'caa68a8f020b4c73e59c7877071217b154cc7a7d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\view\\menu_cliente.tpl',
      1 => 1618446158,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_607787510f3252_48962534 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style>
    
    .thumbnail{

    width: 100%;
    height: 100%;
    border-radius: 4px;
    box-shadow: 0px 0px 5px #adadad;
    }


    @media screen and (max-width: 576px) {

        .botao{
            margin-bottom: 10px;

        }


    }

    </style>


<br>

<h4 class="text-left" style="margin-left: 15px; margin-bottom: -10px;" >Minha conta</h4> 
<hr style="margin-left: 15px; margin-right: 15px;">

<br>

    <section class="container">


<section class="row">

   
    
    <div class="col-md-2 col-4 botao">
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CONTA']->value;?>
" class="btn btn-light thumbnail" ><i class="fas fa-align-justify"></i><br> Painel</a>
    </div>

    <div class="col-md-2 col-4 botao">
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CLIENTE_PEDIDOS']->value;?>
" class="btn btn-light thumbnail"><i class="fas fa-gift"></i><br> Pedidos</a>
    </div>

    <div class="col-md-2 col-4 botao">
        
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CLIENTE_DADOS']->value;?>
" class="btn btn-light thumbnail" ><i class="fas fa-pencil-alt"></i><br> Meus Dados </a>
    </div>

    <div class="col-md-2 col-4 botao">
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO']->value;?>
" class="btn btn-light thumbnail"><i class="fas fa-cart-arrow-down"></i><br> Carrinho </a>
    </div>

    <div class="col-md-2 col-4 botao">
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CLIENTE_SENHA']->value;?>
" class="btn btn-warning thumbnail"><i class="fas fa-key"></i><br> Alterar Senha </a>
    </div>

    <div class="col-md-2 col-4 botao">
        <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_LOGOFF']->value;?>
" class="btn btn-danger thumbnail"><i class="fas fa-door-closed"></i><br> Sair </a>
    </div>
   
</section>
       
        
        
        
        
        
        
       
     
        
        
        
   
    
    
    
    
    
</section><?php }
}

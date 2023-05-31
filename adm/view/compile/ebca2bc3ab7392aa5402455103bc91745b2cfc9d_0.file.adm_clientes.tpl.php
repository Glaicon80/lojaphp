<?php
/* Smarty version 3.1.39, created on 2021-04-29 20:08:00
  from 'C:\xampp\htdocs\lojaphp2\adm\view\adm_clientes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_608b3c50cd5664_08389815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ebca2bc3ab7392aa5402455103bc91745b2cfc9d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\adm\\view\\adm_clientes.tpl',
      1 => 1619737673,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_608b3c50cd5664_08389815 (Smarty_Internal_Template $_smarty_tpl) {
?><style>

@media screen and (min-width: 576px) {

#tabelaClienteMobile{

   display: none;

}

}


@media screen and (max-width: 576px) {


    #tabelaClienteDesktop{

    display: none;
    
}
    
}


</style>

<br>

<h4 class="text-left" style="margin-bottom: -10px;">Gerenciar Clientes</h4>
<hr style="margin-bottom: 30px;">




    <table class="table table-hover " id="tabelaClienteDesktop" style="background-color: white">
    
        
        <tr class="bg-danger text-light" style="font-weight: bold;">
            <td></td>
            <td>Nome</td>
            <td>Email </td>
            <td>Fone </td>
            <td>Data cad</td>
            <td></td>
            
        </tr>
        
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CLIENTES']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
        
        <tr>
            <td><a href="<?php echo $_smarty_tpl->tpl_vars['PAG_PEDIDOS']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['C']->value['cli_id'];?>
 " class="btn btn-info">Pedidos</a> </td>
            <td><?php echo $_smarty_tpl->tpl_vars['C']->value['cli_nome'];?>
 <?php echo $_smarty_tpl->tpl_vars['C']->value['cli_sobrenome'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['C']->value['cli_email'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['C']->value['cli_fone'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['C']->value['cli_data_cad'];?>
</td>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_EDITAR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['C']->value['cli_id'];?>
" class="btn btn-info"> Dados </a>
                
            </td>
            
        </tr>
        
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        
    </table>
    



<!-- tabela mobile-->



<table class="table" id="tabelaClienteMobile">
    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CLIENTES']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
    
      
        <tr class="table-light">
        <th>Nome</th> 
        <td style="width: 150%;padding-left: 0%; padding-right: 0%;"><?php echo $_smarty_tpl->tpl_vars['C']->value['cli_nome'];?>
 <?php echo $_smarty_tpl->tpl_vars['C']->value['cli_sobrenome'];?>
</td>
        </tr>
        <tr class="table-light">
         <th>Email</th> 
         <td style="width: 150%;padding-left: 0%; padding-right: 0%;"><?php echo $_smarty_tpl->tpl_vars['C']->value['cli_email'];?>
</td>
        </tr>
        <tr class="table-light">
        <th>Fone</th> 
        <td style="width: 150%;padding-left: 0%;padding-right: 0%;"><?php echo $_smarty_tpl->tpl_vars['C']->value['cli_fone'];?>
</td>
        </tr>
        <tr class="table-light">
        <th>Data cad</th> 
        <td style="width: 150%;padding-left: 0%;padding-right: 0%;"><?php echo $_smarty_tpl->tpl_vars['C']->value['cli_data_cad'];?>
</td>
        </tr>
        <tr class="table-light">
        <th></th> 
        <td style="width: 150%;padding-left: 0%;padding-right: 0%;"> 

         <table class="table table-borderless" style="margin-left:-25px" >
          <tr  class="table-light" >
          <td>

                <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_PEDIDOS']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['C']->value['cli_id'];?>
 " class="btn btn-info" style="width: 70%;">Pedidos</a>

        </td>

        <td class="text-center">
            <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_EDITAR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['C']->value['cli_id'];?>
" class="btn btn-info" style="width: 80%;"> Dados </a>
        </td>
        </tr>
      </table>

        </td>
    </tr>
    <tr >
        <th></th> 
        <td style="width: 150%;padding-left: 0%;padding-right: 0%;"></td>
    </tr>

    
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    
</table>


 <!--  paginação inferior   -->  
 <section id="pagincao" class="row d-flex justify-content-center" >
    
    <?php echo $_smarty_tpl->tpl_vars['PAGINAS']->value;?>

    
    </section><?php }
}

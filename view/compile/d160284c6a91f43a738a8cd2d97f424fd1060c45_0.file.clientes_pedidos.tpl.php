<?php
/* Smarty version 3.1.39, created on 2023-01-11 19:31:06
  from 'C:\xampp\htdocs\lojaphp\view\clientes_pedidos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_63bf38aa0da454_03106427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd160284c6a91f43a738a8cd2d97f424fd1060c45' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp\\view\\clientes_pedidos.tpl',
      1 => 1620863541,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63bf38aa0da454_03106427 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style>

.thumbnail{

width: 100%;
height: 100%;
border-radius: 4px;
box-shadow: 0px 0px 3px #adadad;
}


  @media screen and (max-width: 576px) {

#tabelaPedidos{

margin-left: -15px;

}

#tbMobile{


  display: block;
}

#tabelaDesktop{

display: none;
}
  }

  @media screen and (min-width: 576px) {

    #tabelaDesktop{

      display: block;
    }

    #tbMobile{

    display: none;
}

  }
</style>

<br>
<br>


    
    <h4 class="text-left" style="margin-left: 15px;margin-bottom: -10px;">Meus pedidos</h4>
    
    <hr style="margin-left: 15px; margin-right: 15px;">

      <?php if ($_smarty_tpl->tpl_vars['PEDIDOS_QUANTIDADE']->value > 0) {?>

      <section class="table-responsive col-md-12" id="tabelaDesktop">

        <table class="table table-striped bg-white" id="tabelaPedidos">
        
        <tr class="table-primary font-weight-bold">
            <td>Data</td>
            <td>Hora</td>
            <td>Tipo pag</td>
            <td>Status</td>
            <td></td>
        </tr>
       
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PEDIDOS']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>
        
        <tr>
          <input type="hidden" name="idPedido" id="idPedido" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['ped_id'];?>
">
            
            <td ><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_data'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_hora'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_tipo'];?>
</td>    
            <td ><span class="text-primary"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_status'];?>
</span></td>
            
             
        <form name="itens" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_ITENS']->value;?>
">
            
             <input type="hidden" name="cod_pedido" id="cod_pedido" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['ped_cod'];?>
">
             <td style="width: 10%"><button class="btn btn-outline-danger btn-sm thumbnail"><i class="fas fa-bars"></i> Detalhes</button></td>
       
        </form>    
            
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        
    </table>
</section>



<section id="tbMobile" class="col-md-12">
       
  <table class="table">

      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PEDIDOS']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>
      
          <tr class="table-light">
          <th scope="row">Data</th> 
          <td><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_data'];?>
 </td>
          </tr>
          <tr class="table-light">
          <th scope="row">Hora</th> 
          <td><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_hora'];?>
</td>
          </tr>
          <tr class="table-light">
          <th scope="row">Tipo</th> 
          <td><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_tipo'];?>
</td>
          </tr>
          <tr class="table-light">
          <th scope="row">Status</th>
          <td class="text-primary"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_status'];?>
</td>
          </tr>
          <tr class="table-light">
            <form name="itens" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_ITENS']->value;?>
">
            <th scope="row"></th> 
              <input type="hidden" name="cod_pedido" id="cod_pedido" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['ped_cod'];?>
">
              <td><button class="btn btn-outline-danger btn-sm thumbnail" style="margin-left: -45px;"><i class="fas fa-bars"></i><br>Detalhes</button></td>
        
           </form> 
            </tr>
            <tr>
              <th scope="row"></th> 
              <td></td>
              </tr>
           
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      
  </table>
</section>    

 

    <?php } else { ?>

    <div class="row" style="margin-left: 15px;">

    Sem pedidos para este cliente!! 

    </div>

   

    <?php }?>
      
    



 <!--  paginação inferior   -->  
 <section id="pagincao" class="row d-flex justify-content-center">
  <center>
  <?php echo $_smarty_tpl->tpl_vars['PAGINAS']->value;?>

  </center>
  </section><?php }
}

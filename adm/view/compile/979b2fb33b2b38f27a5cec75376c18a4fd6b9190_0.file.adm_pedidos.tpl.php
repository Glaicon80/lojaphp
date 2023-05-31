<?php
/* Smarty version 3.1.39, created on 2021-05-12 23:13:20
  from '/home1/meune445/loja.meunegocioweb.com/adm/view/adm_pedidos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_609c8b405939e5_12766805',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '979b2fb33b2b38f27a5cec75376c18a4fd6b9190' => 
    array (
      0 => '/home1/meune445/loja.meunegocioweb.com/adm/view/adm_pedidos.tpl',
      1 => 1620863076,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609c8b405939e5_12766805 (Smarty_Internal_Template $_smarty_tpl) {
?><style>

    @media screen and (min-width: 576px) {
    
    #buttonBuscar{
    
       display: none;
    
    }
    
    }
    
    
    @media screen and (max-width: 576px) {
    
    
        #buttonBuscar2{
    
        display: none;
        
    }
        
    }
    
    
    </style>

<br>

<h4 class="text-left" style="margin-bottom: -10px;">Gerenciar Pedidos</h4>
<hr style="margin-bottom: 30px;">



<form name="buscardata" method="post" action="">
<section class="row" id="pesquisa">
   
        <!---  faz  uma busca entre datas -->
         <label class="col-md-12"> Buscar entre datas</label>

      
       
          <div class="col-md-3 col-5">            
              <input type="date" name="data_ini" class="form-control" required >

          </div> 

          <div class="col-md-3 col-5"> 

              <input type="date" name="data_fim" class="form-control" required>

          </div> 


          <div class="col-md-3 col-1" id="buttonBuscar"> 

              <button class="btn btn-success"  >B</button>

          </div> 

          <div class="col-md-3 col-1" id="buttonBuscar2"> 

            <button class="btn btn-success"  >Buscar</button>

        </div> 


          <div class="col-md-3">    

          </div> 
       
</section>

</form>



<br>

<form name="buscarrefcod" method="post" action="">  
<section class="row">

    
      <label class="col-md-12"> Buscar por Referencia</label>
      

          <div class="col-md-3 col-6">

              <input type="text" name="txt_ref" class="form-control" required>   
          </div>
          <div class="col-md-3 col-6">

              <button class="btn btn-success"> Buscar </button>   
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-3"></div>

</section>
</form>

<hr>


    
      
    
    <table class="table table-hover table-responsive" style="background-color: white">
        
        <tr class="text-light bg-info" style="font-weight: bold;">
            <td>Cliente</td>
            <td>Data</td>
            <td>Hora</td>
            <td>Ref</td>
           
            <td>Status</td>
            <td></td>
            <td></td>
        </tr>
        
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PEDIDOS']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>
        <tr>
            
            <td ><?php echo $_smarty_tpl->tpl_vars['P']->value['cli_nome'];?>
 <?php echo $_smarty_tpl->tpl_vars['P']->value['cli_sobrenome'];?>
</td>
            <td style="width: 10%"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_data'];?>
</td>
            <td style="width: 10%"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_hora'];?>
</td>
            <td style="width: 10%"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_ref'];?>
</td>
            <td style="width: 15%"><span class="label label-info"><?php echo $_smarty_tpl->tpl_vars['P']->value['ped_pag_status'];?>
</span></td>
        
             <td style="width: 10%">
               <!---- formulario que vai para itens do pedido ---->
                     <form name="itens" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_ITENS']->value;?>
">
                     <input type="hidden" name="cod_pedido" id="cod_pedido" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['ped_cod'];?>
">
                     <button class="btn btn-info">Detalhes</button>
                     </form> 
             </td>
       
        
        <td>
              <center>
           <form name="deletar" method="post" action="">
                     <input type="hidden" name="cod_pedido" id="cod_pedido" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['ped_cod'];?>
">
                     <button class="btn btn-danger" name="ped_apagar" value="ped_apagar"><i class="fas fa-times"></i> </button>
           </form> 
             </center>
        </td>
            
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        
    </table>
    
    
    

     <!--  paginação inferior   -->  
    <section id="pagincao" class="row d-flex justify-content-center" >
    
    <?php echo $_smarty_tpl->tpl_vars['PAGINAS']->value;?>

    
    </section> 


    <!-- Modal que só vai ser utilizada para deletar um produto -->
<div class="modal fade" id="modalDeletar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alerta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h5>Deseja excluir pedido?</h5>
        </div>
        <div class="modal-footer">
          <form name="formDeletar" id="formDeletar" method="post" action="">
		   <input type="hidden" name="alertaApagar" id="alertaApagar">
          <button type="submit" class="btn btn-secondary" name="deletarPedido" id="deletarPedido">Excluir</button>
        </form>
        <form method="POST" action="">
          <button type="button" class="btn btn-primary" name="sair" data-dismiss="modal">Cancelar</button>
        </form>
        </div>
      </div>
    </div>
  </div>    

      <?php }
}

<?php
/* Smarty version 3.1.39, created on 2021-05-03 12:13:38
  from 'C:\xampp\htdocs\lojaphp2\adm\view\vendas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60901322c79d78_17946644',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8b0e3f649b048f0e973365cf47d21368b67512c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\adm\\view\\vendas.tpl',
      1 => 1620054330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60901322c79d78_17946644 (Smarty_Internal_Template $_smarty_tpl) {
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

<h4 class="text-left" style="margin-bottom: -10px;">Gerenciamento de vendas e estoque</h4>
<hr style="margin-bottom: 30px;">


<div class="row align-items-end">

<div class="col-md-8 col-12" >
<form name="buscardata" method="post" action="">
    <section class="row" id="pesquisa">
       
            <!---  faz  uma busca entre datas -->
             <label class="col-md-12"> Buscar entre datas</label>
    
          
           
              <div class="col-md-4 col-5">            
                  <input type="date" name="data_ini" class="form-control" required >
    
              </div> 
    
              <div class="col-md-4 col-5"> 
    
                  <input type="date" name="data_fim" class="form-control" required>
    
              </div> 
    
    
              <div class="col-md-3 col-1" id="buttonBuscar"> 
    
                  <button class="btn btn-success"  >B</button>
    
              </div> 
    
              <div class="col-md-3 col-1" id="buttonBuscar2"> 
    
                <button class="btn btn-success"  >Buscar</button>
    
            </div> 
           
    </section>
    
    </form>
    </div>



    <div class="col-md-2 col-7 text-right" style="margin-top: 30px; padding-right: 0;">
        <form name="crescente" method="post" action="">
            <section class="row" id="pesquisa">
               
                
                      <div class="col-md-1" > 
            
                        <button class="btn btn-primary" name="crescente" style="width: 110px;" >Crescente</button>
            
                      </div> 
            
            
                     
            </section>
            
            </form>
            </div>



            <div class="col-md-2 col-5 text-right">
                <form name="crescente" method="post" action="">
                    <section class="row" id="pesquisa">
                       
                        
                              <div class="col-md-1"> 
                    
                                <button class="btn btn-primary" name="decrescente">Decrescente</button>
                    
                              </div> 
                    
                    
                             
                    </section>
                    
                    </form>
                    </div>       


    </div>
    <br>



<!--     exibe mensagem caso nao encontre produtos 
 <?php if ($_smarty_tpl->tpl_vars['PRO_TOTAL']->value < 1) {?>
    <h4 class="alert alert-danger">Ops... Nada foi encontrado </h4>  
 <?php }?> -->

        
    <!--  começa lista de produtos  ---->   

 
 

      
      <table class="table  table-hover table-responsive" id="tabelaDesktop" style="background-color: white;">  
      
          <tr class="table-dark">

                <th scope="col"></th> 
                <th scope="col" >Produto</th> 
                <th scope="col">Categoria</th> 
                <th scope="col">Vendidos</th> 
                <th scope="col">Estoque</th> 
                <th scope="col">Stq min</th>   
                <th scope="col">     </th>
          
          </tr>
          
          
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['VENDAS']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>
    
    <tr>
        
        
        <td style="width: 20%">  <img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['item_img'];?>
" alt="" > </td>
        <td style="width: 20%"> <?php echo $_smarty_tpl->tpl_vars['P']->value['item_nome'];?>
</td>
        <td style="width: 30%"><?php echo $_smarty_tpl->tpl_vars['P']->value['item_nome_categoria'];?>
</td>
        <td style="width: 10%"><?php echo $_smarty_tpl->tpl_vars['P']->value['item_quantidade'];?>
</td>

        <?php if ($_smarty_tpl->tpl_vars['P']->value['pro_stq'] < $_smarty_tpl->tpl_vars['P']->value['pro_stq_min']) {?>
        <td style="width: 10%; color:red; font-weight: bold;"; fontw> <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_stq'];?>
</td>
        <?php } else { ?>
        <td style="width: 10%"> <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_stq'];?>
</td>
        <?php }?>
        <td style="width: 10%"> <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_stq_min'];?>
</td>
        <td style="width: 10%"> 

                <form name="proeditar" method="post" action="">
                <input type="hidden" name="apagarId" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_id'];?>
">
                <button class="btn btn-danger" name="apagar"><i class="fas fa-trash-alt"></i></button>
                </form>   
            
        </td>


    </tr>
    
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    
      </table>







      
<!-- Modal que só vai ser utilizada para deletar um produto -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alerta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h5>Deseja excluir produto?</h5>
        </div>
        <div class="modal-footer">
          <form name="formDeletar" id="formDeletar" method="post" action="">
		   <input type="hidden" name="alertaMensagem2" id="alertaMensagem2">
          <button type="submit" class="btn btn-secondary" name="deletar" id="deletar">Excluir</button>
        </form>
        <form method="POST" action="">
          <button type="button" class="btn btn-primary" name="sair" data-dismiss="modal">Cancelar</button>
        </form>
        </div>
      </div>
    </div>
  </div> <?php }
}

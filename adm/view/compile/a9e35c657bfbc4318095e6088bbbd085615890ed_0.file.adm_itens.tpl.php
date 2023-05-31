<?php
/* Smarty version 3.1.39, created on 2021-05-04 19:04:25
  from 'C:\xampp\htdocs\lojaphp2\adm\view\adm_itens.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6091c4e967aad5_50950102',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9e35c657bfbc4318095e6088bbbd085615890ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\adm\\view\\adm_itens.tpl',
      1 => 1620165846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6091c4e967aad5_50950102 (Smarty_Internal_Template $_smarty_tpl) {
?><style>

    @media screen and (max-width: 576px) {
      
    
     .telaGrande{
      
      display: none;
       
       }
    
       .telaPequena{
      
      display: block;
       
       }
    
        }
    
    
    @media screen and (min-width: 576px) {
    
     .telaGrande{
      
      display: block;
       
       }
    
       .telaPequena{
      
      display: none;
       
       }
       
       }
        
    
      </style>
    
    
    <?php echo '<script'; ?>
>
    // função para copiar o codigo qrcode
    
               function clique(){
                    var texto = $("#codPix1").val();
                    var $temp = $("<input>");
                    $("body").append($temp);
                    $temp.val(texto).select();
                    document.execCommand("copy");
                    $temp.remove();
                    alert ("Código copiado!");
                    };
    
    
    <?php echo '</script'; ?>
>
    
    
    <br>
    <br>
    
    
    <h4 class="text-left" style="margin-left: 15px;margin-bottom: -10px;">Dados do pedido</h4>
    
    <hr style="margin-left: 15px; margin-right: 15px;">
    
    <!-- esse input vai receber o codigo pix ou link do boleto ou debito-->
    <input type="hidden" id="codPix1" value="<?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_link'];?>
">
    
    <!-- aqui começa as sessoes para vista em desktop-->
    
    <section class="table-responsive col-md-12 telaGrande">
    
    <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
    
        <tr class="bg-light" style="margin-left: -20px;">
                
            <td><b>Data:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_data'];?>
</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                      <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
            <td><b>Hora:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_hora'];?>
</td>
            
            <td><b>Ref:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_ref'];?>
</td>
            
            <td class="text-primary font-weight-bold"><b>Status:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_status'];?>
</td>
            
        </tr>  
    
    </table>
    
    </section>
    
    
    
    
    
    <section class="table-responsive col-md-8 telaGrande">
    
        <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
        
            <tr class="bg-light">
                
                <td><b>Cod compra:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_codigo'];?>
</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                          <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
               
                
                <td><b>Tipo Frete:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_frete_tipo'];?>
</td>
    
    
                
            </tr>  
        
        </table>
        
        </section>
    
    
    
    
        <section class="table-responsive col-md-6 telaGrande">
    
            <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
            
                <tr class="bg-light">
    
                    <td><b>Tipo pagamento:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_tipo'];?>
</td>
        
                    <?php if ($_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_tipo'] == "Pix") {?>
                    <td><btn class="btn badge badge-primary" onclick="clique()">Copiar codigo pagamento</btn></td>
                    <?php } elseif ($_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_tipo'] == "Boleto") {?>
                    <td><btn class="btn badge badge-primary"><a href='<?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_link'];?>
' target="_blank"><font color=white>Imprimir boleto</font></a></btn></td>
                    <?php } elseif ($_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_tipo'] == "Debito em conta") {?>
                    <td><btn class="btn badge badge-primary"><a href='<?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_link'];?>
' target="_blank"><font color=white>Imprimir debito em conta</font></a></btn></td>
                    <?php }?>
                    
                </tr>  
            
            </table>
            
            </section>
    
    
    
    
    
        <section class="table-responsive col-md-8 telaGrande">
    
            <br>
    
            <table class="table table-borderless">
            
                <tr class="table-primary">
                    <td></td>
                    <td>Item</td>
                    <td>Valor R$</td>
                    <td>Quantidade</td>
                    <td>Sub Total R$</td>
                </tr>
                
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ITENS']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>
                <tr style="background-color: white;">
                    
                    <td><img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['item_img'];?>
" alt=""> </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['P']->value['item_nome'];?>
</td>
                    <td class="text-right"> <?php echo $_smarty_tpl->tpl_vars['P']->value['item_valor'];?>
</td>
                    <td class="text-center"> <?php echo $_smarty_tpl->tpl_vars['P']->value['item_qtd'];?>
</td>
                    <td class="text-right"> <?php echo $_smarty_tpl->tpl_vars['P']->value['item_sub'];?>
</td>
                    
                </tr>
                
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                
                
            </table>
    
    
    
        </section>
    
    
        <section class="col-md-4">
    
        </section>
    
    
    
        <section class="table-responsive col-md-9 telaGrande">
    
            <br>
    
            <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                <tr class="bg-light" style="margin-left: -20px;">
    
                    <td> <b>Frete R$:</b> <?php echo Sistema::MoedaBR($_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_frete_valor']);?>
</td>
    
                    <td> <b>Total R$:</b> <?php echo Sistema::MoedaBR($_smarty_tpl->tpl_vars['TOTAL']->value);?>
</td>
    
                    <td class="text-danger font-weight-bold"> <b>Final R$:</b> <?php echo Sistema::MoedaBR($_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_frete_valor']+$_smarty_tpl->tpl_vars['TOTAL']->value);?>
</td>
                </tr>   
    
            </table>
    
        </section>
    
    
    
    
        <!-- aqui começa as sessoes para vista em mobile-->
            
            
        
        <section class="col-md-12 telaPequena">
    
            <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
            
                <tr class="bg-light" style="margin-left: -20px;">
                        
                    <td><b>Data:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_data'];?>
</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                              <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                    <td><b>Hora:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_hora'];?>
</td>
                    
                    <td><b>Tipo Frete:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_frete_tipo'];?>
</td>
                    
                </tr>  
            
            </table>
            
            </section>
    
    
    
    
            <section class="col-md-12 telaPequena">
    
                <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                
                    <tr class="bg-light" style="margin-left: -20px;">
                            
                        <td><b>Ref:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_ref'];?>
</td> 
                        
                    </tr>  
                
                </table>
                
                </section>
    
    
                <section class="col-md-12 telaPequena">
    
                    <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                    
                        <tr class="bg-light" style="margin-left: -20px;">
                                
                            <td><b>Cod compra:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_codigo'];?>
</td>
                            
                        </tr>  
                    
                    </table>
                    
                    </section>
    
    
    
    
                    <section class="col-md-12 telaPequena">
    
                        <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                        
                            <tr class="bg-light" style="margin-left: -20px;">
                                    
                                <td><b>Tipo pag:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_tipo'];?>
</td>
    
                                <?php if ($_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_tipo'] == "Pix") {?>
                                <td><btn class="btn badge badge-primary" onclick="clique()">Copiar codigo pagamento</btn></td>
                                <?php } elseif ($_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_tipo'] == "Boleto") {?>
                                <td><btn class="btn badge badge-primary"><a href='<?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_link'];?>
' target="_blank"><font color=white>Imprimir boleto</font></a></btn></td>
                                <?php } elseif ($_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_tipo'] == "Debito em conta") {?>
                                <td><btn class="btn badge badge-primary"><a href='<?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_link'];?>
' target="_blank"><font color=white>Imprimir debito em conta</font></a></btn></td>
                                <?php }?>
                                
                            </tr>  
                        
                        </table>
                        
                        </section>
    
    
    
    
    
    
                    <section class="col-md-12 telaPequena">
    
                        <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                        
                            <tr class="bg-light" style="margin-left: -20px;">
                                    
                                <td class="text-primary font-weight-bold"><b>Status:</b> <?php echo $_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_pag_status'];?>
</td>
                                
                            </tr>  
                        
                        </table>
                        
                        </section>
    
    
           
    
        <section class="col-md-12 telaPequena">
           
            <table class="table">
        
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ITENS']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>
                
                   <tr style="background-color: white;">
                    <th scope="row"></th> 
                    <td> <img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['item_img'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['P']->value['item_nome'];?>
"> </td>
                    </tr>
                    <tr class="table-light">
                    <th scope="row">Produto</th> 
                    <td>  <?php echo $_smarty_tpl->tpl_vars['P']->value['item_nome'];?>
 </td>
                    </tr>
                    <tr class="table-light">
                    <th scope="row">Valor R$</th> 
                    <td>  <?php echo $_smarty_tpl->tpl_vars['P']->value['item_valor'];?>
 </td>
                    </tr>
                    <tr class="table-light">
                    <th scope="row">Quantidade</th> 
                    <td> <?php echo $_smarty_tpl->tpl_vars['P']->value['item_qtd'];?>
  </td>
                    </tr>
                    <tr class="table-light">
                    <th scope="row">Sub Total R$</th>
                    <td>  <?php echo $_smarty_tpl->tpl_vars['P']->value['item_sub'];?>
 </td>
                    </tr>
                
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                
            </table>
        </section>        
        
        
    
        <section class="table-responsive col-md-9 telaPequena">
    
            <br>
    
            <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                <tr class="bg-light" style="margin-left: -20px;">
    
                    <td> <b>Frete R$:</b> <?php echo Sistema::MoedaBR($_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_frete_valor']);?>
</td>
    
                    <td> <b>Total R$:</b> <?php echo Sistema::MoedaBR($_smarty_tpl->tpl_vars['TOTAL']->value);?>
</td>
    
                    <td class="text-danger font-weight-bold"> <b>Final R$:</b> <?php echo Sistema::MoedaBR($_smarty_tpl->tpl_vars['ITENS']->value[1]['ped_frete_valor']+$_smarty_tpl->tpl_vars['TOTAL']->value);?>
</td>
    
                </tr>
    
            </table>
    
        </section>
        <br>
    
        <h4 class="text-left" style="margin-left: 15px;margin-bottom: -10px;">Cliente</h4>
    
        <hr style="margin-left: 15px; margin-right: 15px;">
    
    
        <section class="table-responsive col-md-12 telaGrande">
    
            <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
            
                <tr class="bg-light" style="margin-left: -20px;">
                        
                    <td><b>Cliente:</b> <?php echo $_smarty_tpl->tpl_vars['CLIENTE']->value[0];?>
</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                              <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                    <td><b>Fone:</b> <?php echo $_smarty_tpl->tpl_vars['CLIENTE']->value[1];?>
</td>
                    
                    <td><b>Email:</b> <?php echo $_smarty_tpl->tpl_vars['CLIENTE']->value[2];?>
</td>
                    
                </tr>  
            
            </table>
            
            </section>
    
    
    
            <section class="col-md-12 telaPequena">
    
                <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                
                    <tr class="bg-light" style="margin-left: -20px;">
                            
                        <td><b>Cliente:</b> <?php echo $_smarty_tpl->tpl_vars['CLIENTE']->value[0];?>
</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                                  <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                        <td><b>Fone:</b> <?php echo $_smarty_tpl->tpl_vars['CLIENTE']->value[1];?>
</td>
                        
                        
                    </tr>
                    
                   
                
                </table>
                
                </section>
    
    
                <section class="col-md-12 telaPequena">
    
                    <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                    
                        <tr class="bg-light" style="margin-left: -20px;">
                                
                            <td><b>Email:</b> <?php echo $_smarty_tpl->tpl_vars['CLIENTE']->value[2];?>
</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                                      <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                            
                        </tr>
                        
                       
                    
                    </table>
                    
                    </section>
    
    
    
    
    
    
    
    
    
    
            <br>
    
            <h4 class="text-left" style="margin-left: 15px;margin-bottom: -10px;">Entrega</h4>
        
            <hr style="margin-left: 15px; margin-right: 15px;">
        
        
            <section class="table-responsive col-md-12 telaGrande">
        
                <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                
                    <tr class="bg-light" style="margin-left: -20px;">
                            
                        <td><b>Logradouro:</b> <?php echo $_smarty_tpl->tpl_vars['ENTREGA']->value[0];?>
</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                                  <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                        <td><b>Número:</b> <?php echo $_smarty_tpl->tpl_vars['ENTREGA']->value[1];?>
</td>
                        
                        <td><b>Complemento:</b> <?php echo $_smarty_tpl->tpl_vars['ENTREGA']->value[2];?>
</td>
                        
                    </tr>  
                
                </table>
                
                </section>
    
    
                <section class="table-responsive col-md-12 telaGrande">
        
                    <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                    
                        <tr class="bg-light" style="margin-left: -20px;">
                                
                            <td><b>Bairro:</b> <?php echo $_smarty_tpl->tpl_vars['ENTREGA']->value[3];?>
</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                                      <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                            <td><b>Cep:</b> <?php echo $_smarty_tpl->tpl_vars['ENTREGA']->value[4];?>
</td>
                            
                            <td><b>Cidade:</b> <?php echo $_smarty_tpl->tpl_vars['ENTREGA']->value[5];?>
</td>
    
                            <td><b>Estado:</b> <?php echo $_smarty_tpl->tpl_vars['ENTREGA']->value[6];?>
</td>
                            
                        </tr>  
                    
                    </table>
                    
                    </section>
    
    
    
                    <section class="col-md-12 telaPequena">
    
                        <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                        
                            <tr class="bg-light" style="margin-left: -20px;">
                                    
                                <td><b>Logradouro:</b> <?php echo $_smarty_tpl->tpl_vars['ENTREGA']->value[0];?>
</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                                          <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                                <td><b>N:</b> <?php echo $_smarty_tpl->tpl_vars['ENTREGA']->value[1];?>
</td>
                                
                                <td><b>Complemento:</b> <?php echo $_smarty_tpl->tpl_vars['ENTREGA']->value[2];?>
</td>
                            </tr>
                            
                           
                        
                        </table>
                        
                        </section>
    
    
                        <section class="col-md-12 telaPequena">
    
                            <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                            
                                <tr class="bg-light" style="margin-left: -20px;">
                                        
                                    <td><b>Bairro:</b> <?php echo $_smarty_tpl->tpl_vars['ENTREGA']->value[3];?>
</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                                              <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                                    <td><b>Cep:</b> <?php echo $_smarty_tpl->tpl_vars['ENTREGA']->value[4];?>
</td>
                                    
                                    <td><b>Cdd:</b> <?php echo $_smarty_tpl->tpl_vars['ENTREGA']->value[5];?>
</td>
    
                                    <td><b>Std:</b> <?php echo $_smarty_tpl->tpl_vars['ENTREGA']->value[6];?>
</td>
                                </tr>
                                
                               
                            
                            </table>
                            
                            </section>
    <?php }
}

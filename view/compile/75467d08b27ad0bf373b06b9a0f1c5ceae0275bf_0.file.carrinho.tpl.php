<?php
/* Smarty version 3.1.39, created on 2021-05-12 23:00:24
  from '/home1/meune445/loja.meunegocioweb.com/view/carrinho.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_609c88384f3c25_66741639',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75467d08b27ad0bf373b06b9a0f1c5ceae0275bf' => 
    array (
      0 => '/home1/meune445/loja.meunegocioweb.com/view/carrinho.tpl',
      1 => 1620869918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609c88384f3c25_66741639 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
   var CEP_CLIENTE;
   var bairro;
   var cidade;
       
       
         function buscarFrete(){
          
            if($('#cep_frete1').val()!=""){
                CEP_CLIENTE = $('#cep_frete1').val(); 
            }
            if($('#cep_frete2').val()!=""){
                CEP_CLIENTE = $('#cep_frete2').val(); 
            }


          var PESO_FRETE = $('#peso_frete').val(); // a variavel vai pegar o valor do input de id peso_frete
          var COMPRIMENTO_FRETE = $('#comprimento_frete').val();
          var LARGURA_FRETE = $('#largura_frete').val();
          var ALTURA_FRETE = $('#altura_frete').val(); 
          

            if (CEP_CLIENTE.length !== 8 ) { 
           // alert('Digite seu CEP corretamente, 8 dígitos e sem traço ou ponto');  
             $('#frete').addClass(' text-center text-danger'); //vamos adicionar uma classe bootstrap no span de id = frete
             $('#frete').html('<b>Digite seu CEP corretamente, 8 dígitos e sem traço ou ponto</b>'); // vamos adicionar uma tag html que no caso é o <b> que vai deixar o texto em negrito no span de id = frete
            $('#cep_frete').focus(); // o curso vai para o input de id cep_frete
            } else {


            $('#frete').html('<img src="media/images/loader.gif" width="50" height="50"> <b>Carregando...</b>'); // vamos adicionar uma imagem e um texto ao span
            $('#frete').addClass(' text-center text-danger'); // vamos adicionar uma classe bootstrap no span para estilizar


                 // aqui vamos ver se a cidade e bairro é de uberlandia, pois ai não vamos precisar do correio para entrega local
            let Dados=$(this).serialize(); //aqui vamos pegar o cep e serializa-lo para ser enviado. Os valores serializados podem ser usados ​​na string de consulta de URL ao fazer uma solicitação AJAX
            $.ajax({
                url: 'https://viacep.com.br/ws/'+CEP_CLIENTE+'/json/',
                method:'get',
                dataType:'json',
                data:Dados,
                success: function(Dados){
                   


 if(Dados.localidade =="Uberlândia"){

   

if(Dados.bairro =="Custódio Pereira" || Dados.bairro=="Jardim Ipanema" || Dados.bairro=="Morumbi" || Dados.bairro=="Tibery" || Dados.bairro=="Aclimação" || Dados.bairro=="Brasil" || Dados.bairro=="Marta Helena" || Dados.bairro=="Bosque dos Buritis" || Dados.bairro=="Alto Umuarama" || Dados.bairro=="Dom Almir" || Dados.bairro=="Minas Gerais"){

    let freteValor = "1.00"
    let tipoFrete ="Moto_boy"

    $('#frete').html('<input type="radio" id="frete_radio" onclick ="calcularValores()" name="frete_radio" value='+freteValor+'-'+tipoFrete+'  required  > Entrega: R$ '+freteValor.replace(".", ",")+' - Bairro: '+Dados.bairro+' - Prazo: 1 dia(s)</><br>')
   

}else if(Dados.bairro =="Santa Luzia" || Dados.bairro =="Santa Mônica" || Dados.bairro =="Granada" || Dados.bairro =="Segismundo Pereira" || Dados.bairro =="Martins" || Dados.bairro =="Laranjeiras" || Dados.bairro =="Nossa Senhora das Graças" || Dados.bairro =="Bom Jesus" || Dados.bairro =="Nossa Senhora Aparecida"){

    let freteValor ="2,00";
    let tipoFrete ="Moto boy"

    $('#frete').html('<input type="radio" id="frete_radio" onclick ="calcularValores()" name="frete_radio" value='+freteValor+'-'+tipoFrete+'  required  > Entrega: R$ '+freteValor.replace(".", ",")+' - Bairro: '+Dados.bairro+' - Prazo: 1 dia(s)</><br>')

}else{

    let freteValor ="3,00";
    let tipoFrete ="Moto boy"

    $('#frete').html('<input type="radio" id="frete_radio" onclick ="calcularValores()" name="frete_radio" value='+freteValor+'-'+tipoFrete+'  required  > Entrega: R$ '+freteValor.replace(".", ",")+' - Bairro: '+Dados.bairro+' - Prazo: 1 dia(s)</><br>')
}

}else{

// carrego o combo com os bairros

$('#frete').load('controller/frete.php?cepcliente='+CEP_CLIENTE+'&pesofrete='+PESO_FRETE+'&comprimentofrete='+COMPRIMENTO_FRETE+'&largurafrete='+LARGURA_FRETE+'&alturafrete='+ALTURA_FRETE); 

//O método load () carrega dados de um servidor e coloca os dados retornados no elemento que chamou que no caso é o span ( sem sair desta pagina)
// assim que o metodo load retornar os dados do servidor a imagem gif vai desaparecer pois o codigo do load deve sobrepor ao img

} 
                    
                }
            });

    } 
        }; // fim do change
        
       
   

<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
function calcularValores(){


    $.post('./controller/confirma.php','email=' + $( "input:checked" ).val()+'-'+CEP_CLIENTE, function(retorno){
                if(retorno!=null){
              
              let totalComFrete = ($('#totalCompra').val()).replace(".", "");
              let totalComFrete1 = totalComFrete.replace(",", ".");  
              
              let total = (retorno).replace(".", "");
              let total1 = total.replace(",", ".");  

              
                $('#h42').text(retorno);
                $('#h43').text((parseFloat(total1) + parseFloat(totalComFrete1)).toLocaleString('pt-BR',{ minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                $('#h45').text(retorno);
                $('#h46').text((parseFloat(total1) + parseFloat(totalComFrete1)).toLocaleString('pt-BR',{ minimumFractionDigits: 2, maximumFractionDigits: 2 }));
               
            }else{
            alert("resultado nulo");
            }
            });
            return false


}





function validar(){

   

const cep1 = document.getElementById("cep_frete1").value
const cep2 = document.getElementById("cep_frete2").value


if(cep1.trim()=="" && cep2.trim()==""){
    
    abrirModalAlerta("Preencha o campo do frete")

}else{

    

    if ($("#frete_radio1").prop("checked") || $("#frete_radio2").prop("checked") || $("#frete_radio").prop("checked") ) {


 
       
         window.location.replace("https://loja.meunegocioweb.com/pagamento");
        // window.location.replace("./controller/pagamento.php");
     
}else{

    abrirModalAlerta("Selecione o tipo de frete")
   
}
    
}

}




function abrirModalAlerta(mensagem){
    

$("#modalAlerta").modal()
document.getElementById("alertaMensagem").innerText = mensagem


}

function abrirModalAlerta1(mensagem){

    openModal();

document.getElementById("alertaMensagem").innerText = mensagem


}




<?php echo '</script'; ?>
>



   <style>


#tbPequena{
  display: none;

  }

  #titulo{

  margin-left: 20px; 
  margin-top: -20px;

  }

  #tbGrande{
  margin-left: 20px;
  margin-right: -13px;

  }

  #freteMobile{
    display: none;
  }

  #continuarComprando{

    margin-left: -35px;
    margin-bottom: 10px;
      
    }

    #limparTodosCampos{

    margin-left: -35px;
    margin-bottom: 10px;
   }

    #limparTodosCampos2{

    display: none;
    }

    .linhaSeparacao{

    margin-right: 35px; 
    margin-left: 20px;
}

#cep2{

display: none;
}

#finalizar{

    margin-left: -32px;
}


#carrinho{

margin-top: 20px;
border-left: 1px solid rgb(219, 216, 216); /* colocar uma borda lateral qdo não for mobile*/

}



    
    @media screen and (max-width: 576px) {
        #limparcampo{
    
            padding-top: 50px;
      }

      #finalizar{
    
      padding-top: 30px;
     }


     #titulo{

    margin-left: -10px; 
    margin-top: -20px;
    margin-bottom: -10px;

}

     .modal {
    min-height: 100vh;
    width: 100vw;
    margin: 0;
    border-radius: 0;
  }

  #tbPequena{
  display: block;

  }

  #freteMobile{
    display: block;
  }

  #tbGrande{
  display: none;

  }

  #freteDesktop{

    display: none;

  }

  #continuarComprando{

  margin-left: 40px;
  margin-right: -15px ;
  
}

#limparTodosCampos{

    display: none;
}

#limparTodosCampos2{

 margin-left: 40px;
 margin-right: -15px ;
 display: block;
}

.linhaSeparacao{

margin-left: -10px;
margin-right: -10px;
}

#cep1{

    display: none;
}

#cep2{

display: block;
margin-left: -5%;
margin-right: -5%;

}

#carrinho{

border-left: 0px solid rgb(219, 216, 216); /* colocar uma borda lateral qdo não for mobile*/

}

#finalizar{

margin-left: 0px;
}
     
    }
    </style>
    


    <section class="container" id="carrinho">

        <br>
    
      <h3 id="titulo">Carrinho</h3>
      <hr class="linhaSeparacao">

      <br>

    <div class="row">

       
        <div id="continuarComprando" class="col-md-12 text-right">
            <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_PRODUTOS']->value;?>
" class="btn btn-info" title="">Continuar comprando</a>
        </div>

    </div>






    <!-- tabela visivel para desktop-->
    <!--  table listagem de itens -->
    <section id="tbGrande" class="row">
       
        <table class="table" style="width: 95%">

            <thead>
            <tr class="table-dark">
                <th scope="col"></th> 
                <th scope="col">Produto</th> 
                <th scope="col">Valor R$</th> 
                <th scope="col">Quantidade</th> 
                <th scope="col">Sub Total R$</th> 
                <th scope="col"></th>   
            </tr>
            </thead>
            
           <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>
            
            <tr style="background-color: white;">
                
                <td> <img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
"> </td>
                <td>  <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
 </td>
                <td>  <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_valor'];?>
 </td>
                <td> <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_qtd'];?>
  </td>
                <td>  <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_subTotal'];?>
 </td>
                <td> 
                    <form name="carrinho_dell" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO_ALTERAR']->value;?>
">
                      
                        <input type="hidden" name="pro_id" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_id'];?>
">    
                        <input type="hidden" name="acao" value="del">    
                        
                        <button class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                    </form>
                </td>
                
                
            </tr>
            
           <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            
        </table>

    </section>


<!-- botao visivel para desktop-->
    <div class="row">

       
        <div id="limparTodosCampos" class="col-md-12 text-right">
            <form name="limpar" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO_ALTERAR']->value;?>
">
                <input type="hidden" name="acao" value="limpar">
                <input type="hidden" name="pro_id" value="1">

                <button class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> Limpar todos campos</button>
                

            </form>
        </div>

    </div>




    <!-- tabela visivel para celular-->

    <section id="tbPequena" class="row">
       
        <table class="table table-borderless">
    
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>
            
                <tr style="background-color:rgb(248, 249, 250);">
                <th scope="row"></th> 
                <td> <img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img'];?>
" class="img-thumbnail"  alt="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
"> </td>
                </tr>
                <tr class="table-info">
                <th scope="row">Produto</th> 
                <td>  <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
 </td>
                </tr>
                <tr class="table-info">
                <th scope="row">Valor R$</th> 
                <td>  <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_valor'];?>
 </td>
                </tr>
                <tr class="table-info">
                <th scope="row">Quantidade</th> 
                <td> <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_qtd'];?>
  </td>
                </tr>
                <tr class="table-info">
                <th scope="row">Sub Total R$</th>
                <td>  <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_subTotal'];?>
 </td>
                </tr>
                <tr class="table-info"> 
                <th scope="row"></th>
                <td> 
                    <form name="carrinho_dell" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO_ALTERAR']->value;?>
">
                      
                        <input type="hidden" name="pro_id" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_id'];?>
">    
                        <input type="hidden" name="acao" value="del">    
                        
                        <button class="btn btn-danger btn-sm" style="margin-left: 15%;"><i class="fas fa-times"></i> </button>
                    </form>
                </td>   
            </tr>
            
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            
        </table>
    </section>



    <!-- botao visivel para mobile-->
    <div class="row">

       
        <div id="limparTodosCampos2" class="col-md-12 text-right">
            <form name="limpar" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO_ALTERAR']->value;?>
">
                <input type="hidden" name="acao" value="limpar">
                <input type="hidden" name="pro_id" value="1">

                <button class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> Limpar todos campos</button>
                

            </form>
        </div>

    </div>

    <br><br>





    <!-- tabela visivel no desktop-->
    <section class="row" id="freteDesktop">
    <div class="col-md-6"></div>
    <div class="col-md-6">
        <table class="table" style="width: 93%">
        

                <tr class="table-dark">
                <th >Total no carrrinho</th>
                <td class="table-dark"></td> 
                </tr>
                <tr style="background-color: white;">
                <th >Subtotal R$</th>
                <td id="h41"><?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
</td> 
                </tr> 
                <tr style="background-color: white;">
                <th>Entrega R$</th> 
                <td id="h42"></td> 
                </tr>
                <tr style="background-color: white;">
                <th >Total R$</th> 
                <td id="h43"></td>
                </tr>

        </table>     
    </div>          
    </section>






   <!-- tabela visivel no mobile-->
    <section class="row" id="freteMobile">

        <table class="table">
        

            <tr class="table-dark">

                <td >Subtotal R$</td> 
                <td>Entrega R$</td> 
                <td >Total R$</td> 
            
                
            </tr>

            <tr style="background-color: white;">
                
                <td id="h44"><?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
</td> 
                <td id="h45"></td> 
                <td id="h46"></td> 
            
                
            </tr>

        </table>     
               
    </section>


    <input type="hidden" name="peso_frete" id="peso_frete" value="<?php echo $_smarty_tpl->tpl_vars['PESO']->value;?>
" class="form-control "> 
    <input type="hidden" name="comprimento_frete" id="comprimento_frete" value="<?php echo $_smarty_tpl->tpl_vars['COMPRIMENTO']->value;?>
" class="form-control ">
    <input type="hidden" name="largura_frete" id="largura_frete" value="<?php echo $_smarty_tpl->tpl_vars['LARGURA']->value;?>
" class="form-control "> 
    <input type="hidden" name="altura_frete" id="altura_frete" value="<?php echo $_smarty_tpl->tpl_vars['ALTURA']->value;?>
" class="form-control ">     
    <input type="hidden" name="frete_valor" id="frete_valor" value="0">

         <!-- tabela visivel no desktop-->   
        <section class="row" id="cep1" >
        <div class="col-md-5"></div>
        <div class="col-md-7">
        <table class="table table-borderless" style="width: 100%">

                    <tr>
                        <td style="width: 13%;"></td> 
                        <td style="width: 52%;">

                            <!-- campos para tratar  do  frete -->
                            <input type="text" name="cep_frete1" class="form-control" id="cep_frete1" placeholder="digite seu cep" required>
                            
                        
                        </td> 
                        <td style="width: 4%;"></td> 
                        
                        <td style="width: 30%;">

                            <button class="btn btn-warning" id="buscar_frete1"  onclick="buscarFrete()">Calcular Frete </button> 

                        </td> 

                    </tr>

                    
                    </table>
                

            </div>
            </section>




        <!-- tabela visivel no mobile-->   
        <section class="row" id="cep2">
           
            <table class="table table-borderless">
    
                        <tr>
                            
                            <td  style="padding: 0px; width: 50%;">
    
                                <!-- campos para tratar  do  frete -->
                                
                                <input type="text" name="cep_frete2" class="form-control" id="cep_frete2" placeholder="digite seu cep" required>
                                
                            
                            </td> 
                            
                            
                            <td  class="col-6" style="padding-top: 0%; width: 50%;">
    
                                <button class="btn btn-warning" id="buscar_frete2"  onclick="buscarFrete()">Calcular frete</button> 
    
                            </td> 
    
                        </tr>
    
                        
                        </table>
                    
    
                
                </section>

            

            

            <hr class="linhaSeparacao">
    
        
             
    
            <!-- botoes de baixo e valor total -->
            <section class="row" id="total">
                          
                <div class="col-md-6" >
                    
                    <span id="frete"></span>  
                
                </div>
                
                <div class="col-md-2" >
                    <input type="hidden" name="totalCompra" id="totalCompra" value="<?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
">
               
                </div>
                
                <!-- botão de limpar-->
                <div class="col-md-4" id="finalizar">

                     <button class="btn btn-success btn-block" onclick ="validar()"><i class="fas fa-gift"></i> Finalizar Pedido </button>
    
                </div>
                  
           
    
            </section>



            <!-- modal alerta-->
         <!-- overflow-y:scroll é para rolagem-->
        <div class="modal fade" id="modalAlerta"  tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <!-- agora que a div do modal começa, as anteriores eram para configurações-->
                <!-- modal-header é o cabeçaçho-->
                <div class="modal-header" style="padding: 35px 50px;">

                    <h4 style="color: #448ed3;">Alerta</h4>

                </div>

                <!-- modal-body é o corpo-->

                <div class="modal-body" style="padding: 40px 50px;">

               <label id="alertaMensagem">Erro ao tentar abrir</label>

                </div>
            
                <!-- rodape-->

                <div class="modal-footer">
                        
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    
                </div>

            </div>

        </div>

    </div>

</section>
          
           <br>
           <br>
           <br>
           <br><?php }
}

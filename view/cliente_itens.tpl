
<style>

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


<script>
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


</script>


<br>
<br>


<h4 class="text-left" style="margin-left: 15px;margin-bottom: -10px;">Dados do pedido</h4>

<hr style="margin-left: 15px; margin-right: 15px;">

<!-- esse input vai receber o codigo pix ou link do boleto ou debito-->
<input type="hidden" id="codPix1" value="{$ITENS.1.ped_pag_link}">

<!-- aqui começa as sessoes para vista em desktop-->

<section class="table-responsive col-md-12 telaGrande">

<table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">

    <tr class="bg-light" style="margin-left: -20px;">
            
        <td><b>Data:</b> {$ITENS.1.ped_data}</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                  <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
        <td><b>Hora:</b> {$ITENS.1.ped_hora}</td>
        
        <td><b>Ref:</b> {$ITENS.1.ped_ref}</td>
        
        <td class="text-primary font-weight-bold"><b>Status:</b> {$ITENS.1.ped_pag_status}</td>
        
    </tr>  

</table>

</section>





<section class="table-responsive col-md-8 telaGrande">

    <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
    
        <tr class="bg-light">
            
            <td><b>Cod compra:</b> {$ITENS.1.ped_pag_codigo}</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                      <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
           
            
            <td><b>Tipo Frete:</b> {$ITENS.1.ped_frete_tipo}</td>


            
        </tr>  
    
    </table>
    
    </section>




    <section class="table-responsive col-md-6 telaGrande">

        <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
        
            <tr class="bg-light">

                <td><b>Tipo pagamento:</b> {$ITENS.1.ped_pag_tipo}</td>
    
                {if $ITENS.1.ped_pag_tipo=="Pix"}
                <td><btn class="btn badge badge-primary" onclick="clique()">Copiar codigo pagamento</btn></td>
                {elseif $ITENS.1.ped_pag_tipo=="Boleto"}
                <td><btn class="btn badge badge-primary"><a href='{$ITENS.1.ped_pag_link}' target="_blank"><font color=white>Imprimir boleto</font></a></btn></td>
                {elseif $ITENS.1.ped_pag_tipo=="Debito em conta"}
                <td><btn class="btn badge badge-primary"><a href='{$ITENS.1.ped_pag_link}' target="_blank"><font color=white>Imprimir debito em conta</font></a></btn></td>
                {/if}
                
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
            
            {foreach from=$ITENS item=P}
            <tr style="background-color: white;">
                
                <td><img src="{$P.item_img}" alt=""> </td>
                <td> {$P.item_nome}</td>
                <td class="text-right"> {$P.item_valor}</td>
                <td class="text-center"> {$P.item_qtd}</td>
                <td class="text-right"> {$P.item_sub}</td>
                
            </tr>
            
            {/foreach}
            
            
        </table>



    </section>


    <section class="col-md-4">

    </section>



    <section class="table-responsive col-md-9 telaGrande">

        <br>

        <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
            <tr class="bg-light" style="margin-left: -20px;">

                <td> <b>Frete R$:</b> {Sistema::MoedaBR($ITENS.1.ped_frete_valor)}</td>

                <td> <b>Total R$:</b> {Sistema::MoedaBR($TOTAL)}</td>

                <td class="text-danger font-weight-bold"> <b>Final R$:</b> {Sistema::MoedaBR($ITENS.1.ped_frete_valor+$TOTAL)}</td>
            </tr>   

        </table>

    </section>




    <!-- aqui começa as sessoes para vista em mobile-->
        
        
    
    <section class="col-md-12 telaPequena">

        <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
        
            <tr class="bg-light" style="margin-left: -20px;">
                    
                <td><b>Data:</b> {$ITENS.1.ped_data}</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                          <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                <td><b>Hora:</b> {$ITENS.1.ped_hora}</td>
                
                <td><b>Tipo Frete:</b> {$ITENS.1.ped_frete_tipo}</td>
                
            </tr>  
        
        </table>
        
        </section>




        <section class="col-md-12 telaPequena">

            <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
            
                <tr class="bg-light" style="margin-left: -20px;">
                        
                    <td><b>Ref:</b> {$ITENS.1.ped_ref}</td> 
                    
                </tr>  
            
            </table>
            
            </section>


            <section class="col-md-12 telaPequena">

                <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                
                    <tr class="bg-light" style="margin-left: -20px;">
                            
                        <td><b>Cod compra:</b> {$ITENS.1.ped_pag_codigo}</td>
                        
                    </tr>  
                
                </table>
                
                </section>




                <section class="col-md-12 telaPequena">

                    <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                    
                        <tr class="bg-light" style="margin-left: -20px;">
                                
                            <td><b>Tipo pag:</b> {$ITENS.1.ped_pag_tipo}</td>

                            {if $ITENS.1.ped_pag_tipo=="Pix"}
                            <td><btn class="btn badge badge-primary" onclick="clique()">Copiar codigo pagamento</btn></td>
                            {elseif $ITENS.1.ped_pag_tipo=="Boleto"}
                            <td><btn class="btn badge badge-primary"><a href='{$ITENS.1.ped_pag_link}' target="_blank"><font color=white>Imprimir boleto</font></a></btn></td>
                            {elseif $ITENS.1.ped_pag_tipo=="Debito em conta"}
                            <td><btn class="btn badge badge-primary"><a href='{$ITENS.1.ped_pag_link}' target="_blank"><font color=white>Imprimir debito em conta</font></a></btn></td>
                            {/if}
                            
                        </tr>  
                    
                    </table>
                    
                    </section>






                <section class="col-md-12 telaPequena">

                    <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                    
                        <tr class="bg-light" style="margin-left: -20px;">
                                
                            <td class="text-primary font-weight-bold"><b>Status:</b> {$ITENS.1.ped_pag_status}</td>
                            
                        </tr>  
                    
                    </table>
                    
                    </section>


       

    <section class="col-md-12 telaPequena">
       
        <table class="table">
    
            {foreach from=$ITENS item=P}
            
               <tr style="background-color: white;">
                <th scope="row"></th> 
                <td> <img src="{$P.item_img}" alt="{$P.item_nome}"> </td>
                </tr>
                <tr class="table-light">
                <th scope="row">Produto</th> 
                <td>  {$P.item_nome} </td>
                </tr>
                <tr class="table-light">
                <th scope="row">Valor R$</th> 
                <td>  {$P.item_valor} </td>
                </tr>
                <tr class="table-light">
                <th scope="row">Quantidade</th> 
                <td> {$P.item_qtd}  </td>
                </tr>
                <tr class="table-light">
                <th scope="row">Sub Total R$</th>
                <td>  {$P.item_sub} </td>
                </tr>
            
            {/foreach}
            
        </table>
    </section>        
    
    

    <section class="table-responsive col-md-9 telaPequena">

        <br>

        <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
            <tr class="bg-light" style="margin-left: -20px;">

                <td> <b>Frete R$:</b> {Sistema::MoedaBR($ITENS.1.ped_frete_valor)}</td>

                <td> <b>Total R$:</b> {Sistema::MoedaBR($TOTAL)}</td>

                <td class="text-danger font-weight-bold"> <b>Final R$:</b> {Sistema::MoedaBR($ITENS.1.ped_frete_valor+$TOTAL)}</td>

            </tr>

        </table>

    </section>
    <br>

    <h4 class="text-left" style="margin-left: 15px;margin-bottom: -10px;">Cliente</h4>

    <hr style="margin-left: 15px; margin-right: 15px;">


    <section class="table-responsive col-md-12 telaGrande">

        <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
        
            <tr class="bg-light" style="margin-left: -20px;">
                    
                <td><b>Cliente:</b> {$CLIENTE.0}</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                          <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                <td><b>Fone:</b> {$CLIENTE.1}</td>
                
                <td><b>Email:</b> {$CLIENTE.2}</td>
                
            </tr>  
        
        </table>
        
        </section>



        <section class="col-md-12 telaPequena">

            <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
            
                <tr class="bg-light" style="margin-left: -20px;">
                        
                    <td><b>Cliente:</b> {$CLIENTE.0}</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                              <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                    <td><b>Fone:</b> {$CLIENTE.1}</td>
                    
                    
                </tr>
                
               
            
            </table>
            
            </section>


            <section class="col-md-12 telaPequena">

                <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                
                    <tr class="bg-light" style="margin-left: -20px;">
                            
                        <td><b>Email:</b> {$CLIENTE.2}</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
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
                        
                    <td><b>Logradouro:</b> {$ENTREGA.0}</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                              <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                    <td><b>Número:</b> {$ENTREGA.1}</td>
                    
                    <td><b>Complemento:</b> {$ENTREGA.2}</td>
                    
                </tr>  
            
            </table>
            
            </section>


            <section class="table-responsive col-md-12 telaGrande">
    
                <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                
                    <tr class="bg-light" style="margin-left: -20px;">
                            
                        <td><b>Bairro:</b> {$ENTREGA.3}</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                                  <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                        <td><b>Cep:</b> {$ENTREGA.4}</td>
                        
                        <td><b>Cidade:</b> {$ENTREGA.5}</td>

                        <td><b>Estado:</b> {$ENTREGA.6}</td>
                        
                    </tr>  
                
                </table>
                
                </section>



                <section class="col-md-12 telaPequena">

                    <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                    
                        <tr class="bg-light" style="margin-left: -20px;">
                                
                            <td><b>Logradouro:</b> {$ENTREGA.0}</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                                      <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                            <td><b>N:</b> {$ENTREGA.1}</td>
                            
                            <td><b>Complemento:</b> {$ENTREGA.2}</td>
                        </tr>
                        
                       
                    
                    </table>
                    
                    </section>


                    <section class="col-md-12 telaPequena">

                        <table class="table table-striped bg-white table-borderless" id="tabelaPedidos" style="margin-left: -12px;">
                        
                            <tr class="bg-light" style="margin-left: -20px;">
                                    
                                <td><b>Bairro:</b> {$ENTREGA.3}</td> <!-- aqui o array é tratado dessa maneira onde 1 vai ser a primeira posição do array-->
                                                                          <!-- se não colocar a posição vai dar erro pois ficaria indefinido-->
                                <td><b>Cep:</b> {$ENTREGA.4}</td>
                                
                                <td><b>Cdd:</b> {$ENTREGA.5}</td>

                                <td><b>Std:</b> {$ENTREGA.6}</td>
                            </tr>
                            
                           
                        
                        </table>
                        
                        </section>


        


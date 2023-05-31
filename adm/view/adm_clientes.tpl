<style>

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
        
        {foreach from=$CLIENTES item=C}
        
        <tr>
            <td><a href="{$PAG_PEDIDOS}/{$C.cli_id} " class="btn btn-info">Pedidos</a> </td>
            <td>{$C.cli_nome} {$C.cli_sobrenome}</td>
            <td>{$C.cli_email}</td>
            <td>{$C.cli_fone}</td>
            <td>{$C.cli_data_cad}</td>
            <td>
                <a href="{$PAG_EDITAR}/{$C.cli_id}" class="btn btn-info"> Dados </a>
                
            </td>
            
        </tr>
        
        {/foreach}
        
    </table>
    



<!-- tabela mobile-->



<table class="table table-borderless" id="tabelaClienteMobile">
    
    {foreach from=$CLIENTES item=C}
    
      
        <tr class="table-info">
        <th>Nome</th> 
        <td style="width: 150%;padding-left: 0%; padding-right: 0%;">{$C.cli_nome} {$C.cli_sobrenome}</td>
        </tr>
        <tr class="table-info">
         <th>Email</th> 
         <td style="width: 150%;padding-left: 0%; padding-right: 0%;">{$C.cli_email}</td>
        </tr>
        <tr class="table-info">
        <th>Fone</th> 
        <td style="width: 150%;padding-left: 0%;padding-right: 0%;">{$C.cli_fone}</td>
        </tr>
        <tr class="table-info">
        <th>Data cad</th> 
        <td style="width: 150%;padding-left: 0%;padding-right: 0%;">{$C.cli_data_cad}</td>
        </tr>
        <tr class="table-info">
        <th></th> 
        <td style="width: 150%;padding-left: 0%;padding-right: 0%;"> 

         <table class="table table-borderless" style="margin-left:-25px" >
          <tr  class="table-info" >
          <td>

                <a href="{$PAG_PEDIDOS}/{$C.cli_id} " class="btn btn-info" style="width: 70%;">Pedidos</a>

        </td>

        <td class="text-center">
            <a href="{$PAG_EDITAR}/{$C.cli_id}" class="btn btn-info" style="width: 80%;"> Dados </a>
        </td>
        </tr>
      </table>

        </td>
    </tr>
    <tr >
        <th></th> 
        <td style="width: 150%;padding-left: 0%;padding-right: 0%;"></td>
    </tr>

    
    {/foreach}
    
</table>


 <!--  paginação inferior   -->  
 <section id="pagincao" class="row d-flex justify-content-center" >
    
    {$PAGINAS}
    
    </section>
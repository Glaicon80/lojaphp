
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

      {if $PEDIDOS_QUANTIDADE>0}

      <section class="table-responsive col-md-12" id="tabelaDesktop">

        <table class="table table-striped bg-white" id="tabelaPedidos">
        
        <tr class="table-primary font-weight-bold">
            <td>Data</td>
            <td>Hora</td>
            <td>Tipo pag</td>
            <td>Status</td>
            <td></td>
        </tr>
       
        {foreach from=$PEDIDOS item=P}
        
        <tr>
          <input type="hidden" name="idPedido" id="idPedido" value="{$P.ped_id}">
            
            <td >{$P.ped_data}</td>
            <td >{$P.ped_hora}</td>
            <td >{$P.ped_pag_tipo}</td>    
            <td ><span class="text-primary">{$P.ped_pag_status}</span></td>
            
             
        <form name="itens" method="post" action="{$PAG_ITENS}">
            
             <input type="hidden" name="cod_pedido" id="cod_pedido" value="{$P.ped_cod}">
             <td style="width: 10%"><button class="btn btn-outline-danger btn-sm thumbnail"><i class="fas fa-bars"></i> Detalhes</button></td>
       
        </form>    
            
        </tr>
        {/foreach}
        
    </table>
</section>



<section id="tbMobile" class="col-md-12">
       
  <table class="table">

      {foreach from=$PEDIDOS item=P}
      
          <tr class="table-light">
          <th scope="row">Data</th> 
          <td>{$P.ped_data} </td>
          </tr>
          <tr class="table-light">
          <th scope="row">Hora</th> 
          <td>{$P.ped_hora}</td>
          </tr>
          <tr class="table-light">
          <th scope="row">Tipo</th> 
          <td>{$P.ped_pag_tipo}</td>
          </tr>
          <tr class="table-light">
          <th scope="row">Status</th>
          <td class="text-primary">{$P.ped_pag_status}</td>
          </tr>
          <tr class="table-light">
            <form name="itens" method="post" action="{$PAG_ITENS}">
            <th scope="row"></th> 
              <input type="hidden" name="cod_pedido" id="cod_pedido" value="{$P.ped_cod}">
              <td><button class="btn btn-outline-danger btn-sm thumbnail" style="margin-left: -45px;"><i class="fas fa-bars"></i><br>Detalhes</button></td>
        
           </form> 
            </tr>
            <tr>
              <th scope="row"></th> 
              <td></td>
              </tr>
           
      {/foreach}
      
  </table>
</section>    

 

    {else}

    <div class="row" style="margin-left: 15px;">

    Sem pedidos para este cliente!! 

    </div>

   

    {/if}
      
    



 <!--  paginação inferior   -->  
 <section id="pagincao" class="row d-flex justify-content-center">
  <center>
  {$PAGINAS}
  </center>
  </section>
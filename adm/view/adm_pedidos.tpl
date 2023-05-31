<style>

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
        
        {foreach from=$PEDIDOS item=P}
        <tr>
            
            <td >{$P.cli_nome} {$P.cli_sobrenome}</td>
            <td style="width: 10%">{$P.ped_data}</td>
            <td style="width: 10%">{$P.ped_hora}</td>
            <td style="width: 10%">{$P.ped_ref}</td>
            <td style="width: 15%"><span class="label label-info">{$P.ped_pag_status}</span></td>
        
             <td style="width: 10%">
               <!---- formulario que vai para itens do pedido ---->
                     <form name="itens" method="post" action="{$PAG_ITENS}">
                     <input type="hidden" name="cod_pedido" id="cod_pedido" value="{$P.ped_cod}">
                     <button class="btn btn-info">Detalhes</button>
                     </form> 
             </td>
       
        
        <td>
              <center>
           <form name="deletar" method="post" action="">
                     <input type="hidden" name="cod_pedido" id="cod_pedido" value="{$P.ped_cod}">
                     <button class="btn btn-danger" name="ped_apagar" value="ped_apagar"><i class="fas fa-times"></i> </button>
           </form> 
             </center>
        </td>
            
        </tr>
        {/foreach}
        
    </table>
    
    
    

     <!--  paginação inferior   -->  
    <section id="pagincao" class="row d-flex justify-content-center" >
    
    {$PAGINAS}
    
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

      
<style>

@media screen and (max-width: 576px) {

    #tabelaDesktop{

    display: none;

   }

  

}


@media screen and (min-width: 576px) {

    #tabelaMobile{

    display: none;
    }


}




</style>



<br>

<h4 class="text-left" style="margin-bottom: -10px;">Gerenciar Produtos</h4>
<hr style="margin-bottom: 30px;">


<section class="row ">
    
    
 <div class="col-md-4"> </div>

 

    <div class="col-md-4"> </div>

    <div class="col-md-4 text-right">
        <a href="{$PAG_PRODUTO_NOVO}" class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i> Novo Produto</a>

    </div>




</section>
<br>

<!--     exibe mensagem caso nao encontre produtos -->
 {if $PRO_TOTAL < 1}
    <h4 class="alert alert-danger">Ops... Nada foi encontrado </h4>  
 {/if}

        
    <!--  começa lista de produtos  ---->   

 <section class="container">

  <section id="produtos" class="row">  
 

      
      <table class="table" id="tabelaDesktop" style="background-color: white; width: 100%;">  
      
          <tr class="table-dark">

                <th scope="col"></th> 
                <th scope="col">Produto</th> 
                <th scope="col">Categoria</th> 
                <th scope="col">Preço</th> 
                <th scope="col">     </th> 
                <th scope="col">     </th>   
                <th scope="col">     </th>
          
          </tr>
          
          
    {foreach from=$PRO item=P}
    
    <tr>
        
        
        <td>  <img src="{$P.pro_img_p}" alt="" > </td>
        <td> {$P.pro_nome}</td>
        <td>{$P.cate_nome}</td>
        <td>R$ {$P.pro_valor}</td>
        <td>

            <form name="proeditar" method="post" action="{$PAG_PRODUTO_EDITAR}">
                <input type="hidden" name="pro_id" id="pro_id" value="{$P.pro_id}">
                <button class="btn btn-success"><i class="fas fa-pencil-alt"></i></button>
   
            </form>   
            
        </td>


        <td>

            <form name="proapagar" method="post" action="">
                <input type="hidden" name="pro_id_apagar" id="pro_id_apagar" value="{$P.pro_id}">
                <!----pega o caminho completo da imagem atual -->
                <input type="hidden" name="pro_img_arquivo" id="pro_img_arquivo" value="{$P.pro_img_arquivo}">
                <button class="btn btn-danger" name="apagar" id="apagar"><i class="fas fa-trash-alt"></i></button>
   
            </form>   
            
        </td>


        <td>

            <form name="proimg" method="post" action="{$PAG_PRODUTO_IMG}">
                <input type="hidden" name="pro_id" id="pro_id" value="{$P.pro_id}">
                <input type="hidden" name="pro_nome" id="pro_nome" value="{$P.pro_nome}">
                <button class="btn btn-info"><i class="fas fa-image"></i></button>
   
            </form> 
            
        </td>


    </tr>
    
    {/foreach}
    
      </table>




      <table class="table table-borderless" id="tabelaMobile">
    
        {foreach from=$PRO item=P}
        
           <tr style="background-color:rgb(248, 249, 250);">
            <th scope="row"></th> 
            <td> <img src="{$P.pro_img_p}" class="img-thumbnail" alt="{$P.pro_nome}" style="margin-left: 9%;"> </td>
            </tr>
            <tr class="table-danger">
            <th scope="row">Produto</th> 
            <td style="width: 70%;">{$P.pro_nome}</td>
            </tr>
            <tr class="table-danger">
             <th scope="row">Categoria</th> 
             <td style="width: 70%;">{$P.cate_nome}</td>
            </tr>
            <tr class="table-danger">
            <th scope="row">Valor R$</th> 
            <td>  {$P.pro_valor} </td>
            </tr>
            <tr class="table-danger">
            <th scope="row"></th> 
            <td> 

                <table class="table table-borderless" style="width: 150%; margin-left: -50%;">
              <tr  class="table-danger" >
                  <td class="text-center">
                <form name="proeditar" method="post" action="{$PAG_PRODUTO_EDITAR}">
                    <input type="hidden" name="pro_id" id="pro_id" value="{$P.pro_id}">
                    <button class="btn btn-success" ><i class="fas fa-pencil-alt"></i></button>
       
                </form>   
            </td>
            <td class="text-center">
                <form name="proapagar" method="post" action="">
                    <input type="hidden" name="pro_id_apagar" id="pro_id_apagar" value="{$P.pro_id}">
                    <!----pega o caminho completo da imagem atual -->
                    <input type="hidden" name="pro_img_arquivo" id="pro_img_arquivo" value="{$P.pro_img_arquivo}">
                    <button class="btn btn-danger" name="apagar" id="apagar"><i class="fas fa-trash-alt"></i></button>
       
                </form>   
            </td>

            <td class="text-center">
                <form name="proimg" method="post" action="{$PAG_PRODUTO_IMG}">
                    <input type="hidden" name="pro_id" id="pro_id" value="{$P.pro_id}">
                    <input type="hidden" name="pro_nome" id="pro_nome" value="{$P.pro_nome}">
                    <button class="btn btn-info" ><i class="fas fa-image"></i></button>
       
                </form> 
            </td>
            </tr>
          </table>
            </td>
            </tr>

        
        {/foreach}
        
    </table>


    
    </section>
</section>
    
   
    <!--  paginação inferior   -->  
    <section id="pagincao" class="row d-flex justify-content-center" >
    
        {$PAGINAS}
        
        </section>





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
  </div>    


   
 


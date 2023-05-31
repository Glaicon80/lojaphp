
<br>

<h4 class="text-left" style="margin-bottom: -10px;"> Gerenciar categorias </h4>
<hr style="margin-bottom: 30px;">


    <form name="categoriainsere" method="post" action="">
    <section class="row">
    
    
        <div class="col-md-2"></div>
        <div class="col-md-4 col-6 mb-3">
            <input type="text" name="cate_nome" class="form-control" required>  
        </div>
        <div class="col-md-4 col-6 mb-3">
            <button class="btn btn-success" name="cate_nova" value="cate_nova"> Inserir nova </button>
            
        </div>
       

     </section>
     </form>

<hr>

<!-- section listar categorias -->
<section class="row" id="listarcategorias">


    <div class="col-md-2"></div>


    <div class="col-md-6" style="margin-left: 0px;">

    <table class="table table-borderless" style="margin-left: -10px;">
        
      
        {foreach from=$CATEGORIAS item=C}
            <form name="categorias_editar" method="post" action="">
               
                <tr>

                    <td style="width: 70%">
                         <input type="text" name="cate_nome" value="{$C.cate_nome}" class="form-control" required> 
                          <input type="hidden" name="cate_id" value="{$C.cate_id}">
                    </td>
                       
                    <td>
                        <button class="btn btn-success" name="cate_editar" value="cate_editar">Editar</button> <!-- se clicar no botão editar vai existir um $_POST['cate_editar'] mas o $_POST['cate_apagar'] não vai existir-->
                    </td>
                   
                    <td>
                        <button class="btn btn-danger" name="cate_apagar" value="cate_apagar">Apagar</button> <!-- se clicar no botão Apagar vai existir um $_POST['cate_apagar'] mas o $_POST['cate_editar'] não vai existir-->
                    </td>


                </tr>        

            </form>
            
        {/foreach}
        
    </table>

</div>


<div class="col-md-2"></div>
    
</section>
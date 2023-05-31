<style>
.thumbnail{

    border-radius: 15px;
    box-shadow: 6px 6px 10px #adadad;
   
    }

</style>


<br>

<h4 class="text-left" style="margin-bottom: -10px;">Imagens do produto</h4>
<hr style="margin-bottom: 30px;">

<!--- formulario de envio da foto -->

<form name="nova" method="post" action=""  enctype="multipart/form-data">
<section class="row" id="novaimg">
    
    

        <div class="col-md-4"></div>

        <div class="col-md-4">

            <input type="hidden" name="pro_id" value="{$PRO}">

            <input type="file" name="pro_img"  class="form-control-file"  required>  
            <br>

            

        </div>
        <div class="col-md-4">
            <button class="btn btn-success "> Enviar </button> 


        </div>
            
        
    
</section>

</form> 

<hr>



  <form name="deletar" method="post" action="">
 
  <ul style="list-style: none" >
      

    
        <div class="row d-flex justify-content-center" style="margin-left: -55px;">
                          

          {foreach from=$IMAGES item=I}  <!-- aqui abrimos foreach do php entre chaves (observe que éssa é uma forma diferente de chamar comandos php sem o <?php ?>)-->
                                    <!-- $PRO vai receber o $produtos->GetItens() que é a lista de produtos , e cada item da lista de produto vai ser guardada em P -->
                                        <!-- o foreach vai percorrer todos os li. cada li vai conter os dados de um item (P)-->
                  <li class="col-md-4 col-6" style="padding-bottom: 20px;"> <!-- aqui vamos definir que cada li  col-md-4, ou seja, sera 3 li por linha-->

              

                    <img src="{$I.img_nome}" alt="" class = "img-fluid thumbnail mx-auto d-block" style="background-color: white;">
                    <br>

                    <label>Apagar?</label> 
                    <input type="checkbox" class=" input-lg" name="fotos_apagar[]" value="{$I.img_arquivo}">   <!-- observe que o checkbox vai ser um array em name="fotos_apagar[] , isso é comum para checkbox" -->

              


          </li>
    

          {/foreach}  <!-- aqui fechamos foreach do php entre chaves (obs: mesmo o for não ficando delimitado , tudo que esta entre os dois comandos dor for vai passar na repetição)-->
          
          

           </div>
           
           <input type="hidden" name="pro_id" value="{$I.img_prod_id}"> <!-- vamos envia o id do produto -->
  </ul>

  <!--- botao de apagar fotos -->
  <br>
  <section class="col-md-12 text-center" id="apagar">
    <hr>
    
      <button class="btn btn-danger" id="butonApagar"> Apagar Marcadas </button>
      
      
  </section>
  <br>
  <br>
  <br>
  
</form>      
             
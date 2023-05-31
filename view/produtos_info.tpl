<!-- aqui vai o caminho para o arquivo CSS baguetteBox.min.css responsavel por carregar o zoom das fotos-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
<link rel="stylesheet" href="tema/css/gallery-grid.css">


<style>
#menuLateral{

display: none;

}

#topo {

min-height: 100px;
background-image: url("{$MEDIA}/images/fundoazul.png");

color: #fff;

}

#imagensExtras{

   list-style: none;
   margin-left: -57px;
   margin-right: -17px;
    
 }

@media screen and (min-width: 576px) {

#fotoGrande{

margin-left: -90px;

}

#descricao{

    margin-left: 10px;

}

#tituloImagensExtras{ margin-left: 10px;}

#imagensExtras{

    margin-left: -95px;
    }

}

</style>

<script>
    $('#colunaCentral').removeClass('col-md-9 order-md-2');
    $('#colunaCentral').addClass(' col-md-12');
</script>

<br>

{foreach from=$PRO item=P}


<section id="produtos" class="container">  

<div class="row" id="fotoGrande" >
    
  
    {*  div da esquerda imagem do produto coom zoom  *}

        <div class="col-md-8 ">
            <div class="tz-gallery"> <!-- essa classe vei baguetteBox -->
                <a class="lightbox" href="{$P.pro_img_g}">
                    <img class = "img-fluid img-thumbnail mx-auto d-block" src="{$P.pro_img_g}" alt="Park">
                </a>
            </div>
            
        </div>
        


   
	{*    div da direita info produtos    *}
    <div class="col-md-4">
        
          <img class="mx-auto d-block" src="{$MEDIA}/images/logo-pagseguro.png" alt="">
  <hr>

  <h4 class="text-left">{$P.pro_nome}</h4>
  <h6 class="text-left" style="padding-bottom: 20px;">Ref: {$P.pro_ref}</h6>      
  <h6 class="text-left" style="padding-bottom: 20px;">
    
    {if $P.pro_estoque >5}
    Disponibilidade: Em estoque
    {else}
    Disponibilidade: {$P.pro_estoque} Unidades
    {/if}
</h6>
        
        <div class="col-md-6" style="margin-left: -15px;">
           <h4 class="text-left text-primary">R$ {$P.pro_valor}</h4>   
            <br>
        </div>

        <hr>
        
        <form name="carrinho" method="post" action="{$PAG_COMPRAR}">
        <input type="hidden" name="pro_id" value="{$P.pro_id}">
        <input type="hidden" name="acao" value="add">  
        <table class="table table-borderless"  style="width: 70%; margin-left: -12px;">
        <tr>
        <td style="width: 40%;">
        <input type="number" name="quantidade" class="form-control mb-2" value="1">
        </td>
        <td style="width: 60%";>
        <button  class="btn btn-success btn-lg align-middle" style="padding-top: 5px; padding-bottom: 1px; padding-left: 20px; padding-right: 20px;">Comprar</button>
        </td> 
        </tr>
        </table>
        </form>

    </div>

</div>
  <br>


        <!-- -->
         {*  listagem de imagens extras  *}

         {if count($IMAGES)>0}
         
         <h4 class="text-left" id="tituloImagensExtras" >Mais imagens</h4>
         

        <br>
 
        
         <!-- aqui vai mostrar as imagens extras já com a propriedade de zoom e carrocel , eu copiei e colei da internet-->
        
        
         <div class="container gallery-container">
        
            <div class="tz-gallery">
    
                    <ul id="imagensExtras"  style="list-style: none" >
        
                        <div class="row d-flex justify-content-center">
    
                    {foreach from=$IMAGES item = I}
                    <li class="col-md-4 col-6" >
                        <a class="lightbox" href="{$I.img_link}">
                            <img class = "img-fluid img-thumbnail mx-auto d-block" src="{$I.img_nome}" alt="Park">
                        </a>
                        <br>
                    </li>
                    {/foreach}
                </div>
                </ul>
        
            </div>
        
        </div>


      
      <br>
      {/if}


            {*    <!-- descrição do produto-->  *}

        <div class="row">
           
        <div class="col-md-12 text-justify" id="descricao">
            <h4 class="text-left">Descrição do produto</h4>

            {$P.pro_desc} 

        </div>
        </div>  
            <br>
            <br>

      </section>
      {/foreach}

<!-- aqui vai o caminho para o arquivo javascript baguetteBox.min.js responsavel por carregar o zoom das fotos-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>


<style>
/* vamos controlar o movimento da bolinha das ofertas*/
@media screen and (min-width: 576px) {

#bolinhaOferta{

left: 86%;


}
}

@media screen and (max-width: 576px) {

#bolinhaOferta{

left: 81%;


}
}


</style>



<br>
    
<h3 class="text-left" style="margin-left: 0px;margin-bottom: -10px;">Loja </h3>
    
<hr style="margin-left: 0px; margin-right: 0px;">
      <br>

{if $PRO_TOTAL <1}

    {Sistema::janelaModal('Nenhum produto encontrado!!')}
	{Rotas::Redirecionar(2, Rotas::pag_Produtos())}

<!-- <h4 class="alert alert-danger">Nenhum produto encontrado!!</h4> -->

<!-- <meta http-equiv="refresh" content = 1; url="{$PRODUTOS}">  qdo queremos dar um refresh via html utilizamos a tag meta com content = tempo em segundos e apontamos a direção na url -->

{/if}



       
    <!--  começa lista de produtos  ---->   
  <section id="produtos" >  
 
		<ul style="list-style: none" >
		    

		  
		      <div class="row" style="margin-left: -55px;">
                            

		       {foreach from=$PRO item=P}  <!-- aqui abrimos foreach do php entre chaves (observe que éssa é uma forma diferente de chamar comandos php sem o <?php ?>)-->
		                                  <!-- $PRO vai receber o $produtos->GetItens() que é a lista de produtos , e cada item da lista de produto vai ser guardada em P -->
                                          <!-- o foreach vai percorrer todos os li. cada li vai conter os dados de um item (P)-->
                    <li class="col-md-4 col-6" style="padding-bottom: 20px;"> <!-- aqui vamos definir que cada li  col-md-4, ou seja, sera 3 li por linha-->

		            {if $P.pro_estoque > 0}

					{if $P.pro_promocao != 0}

					<div class="text-center" id="bolinhaOferta" style="background-color: red; width: 3em; height: 3em; border-radius: 100%; position: relative;top: 2em; color: white;line-height: 40px; margin-top: -39px; font-size: 0.8em;">Oferta</div>

		                <a href="{$PRO_INFO}/{$P.pro_id}/{$P.pro_slug}"> <!-- $PRO_INFO vem lá de produtos.php e a url fica http://localhost/lojaphp/produtos_info/1/camisa-social-->


		                    <img src="{$P.pro_img}" class = "img-fluid img-thumbnail mx-auto d-block" style="width: 290px;" alt="" > <!--$P.pro_img vai ter o caminho até a imagem-->
							<figcaption class = "figure-caption text-center text-primary font-weight-bold"> {$P.pro_nome}</figcaption>
							<center>
							<table>
							<tr>
							<td>	
							<figcaption class = "figure-caption text-center text-secondary font-weight-bold" style="font-size:small;text-decoration: line-through;"> R$ {$P.pro_promocao}</figcaption>	
						    </td>
							<td>
							<figcaption class = "figure-caption text-center text-danger font-weight-bold" style="font-size:medium;"> R$ {$P.pro_valor}</figcaption>
						    </td>
						    </tr>
						    </table>
						   </center>

		                </a>

						{else}

						<a href="{$PRO_INFO}/{$P.pro_id}/{$P.pro_slug}"> <!-- $PRO_INFO vem lá de produtos.php e a url fica http://localhost/lojaphp/produtos_info/1/camisa-social-->


		                    <img src="{$P.pro_img}" class = "img-fluid img-thumbnail mx-auto d-block" style="width: 290px;" alt="" > <!--$P.pro_img vai ter o caminho até a imagem-->
							<figcaption class = "figure-caption text-center text-primary font-weight-bold"> {$P.pro_nome}</figcaption>
							<figcaption class = "figure-caption text-center text-danger font-weight-bold" style="font-size:medium;"> R$ {$P.pro_valor}</figcaption>
		                    

		                </a>

						{/if}

		           {else}

				    <img src="{$P.pro_img}" class = "img-fluid img-thumbnail mx-auto d-block" style="width: 290px;" alt="" > <!--$P.pro_img vai ter o caminho até a imagem-->
		    		<figcaption class = "figure-caption text-center text-primary font-weight-bold"> {$P.pro_nome}</figcaption>
					<figcaption class = "figure-caption text-center text-danger font-weight-bold" style="font-size:medium;"> R$ {$P.pro_valor}</figcaption>
					<div class="alert alert-danger text-center" role="alert" style="color: red;padding: 0%;">Produto esgotado</div>
				   {/if}


		        </li>
			

		        {/foreach}  <!-- aqui fechamos foreach do php entre chaves (obs: mesmo o for não ficando delimitado , tudo que esta entre os dois comandos dor for vai passar na repetição)-->
		        
		         </div>
		         
		    
		</ul>
    
    </section>
    
    
     <!--  paginação inferior   -->  
    <section id="pagincao" class="row d-flex justify-content-center" >
    
    {$PAGINAS}
    
    </section>


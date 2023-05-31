<?php
/* Smarty version 3.1.39, created on 2021-05-13 19:42:32
  from '/home1/meune445/loja.meunegocioweb.com/view/produtos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_609dab581d00b6_45439352',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e055acfdf4346ce0c0bbeed9db72fb71a131c7fa' => 
    array (
      0 => '/home1/meune445/loja.meunegocioweb.com/view/produtos.tpl',
      1 => 1620945660,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609dab581d00b6_45439352 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
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

<?php if ($_smarty_tpl->tpl_vars['PRO_TOTAL']->value < 1) {?>

    <?php echo Sistema::janelaModal('Nenhum produto encontrado!!');?>

	<?php echo Rotas::Redirecionar(2,Rotas::pag_Produtos());?>


<!-- <h4 class="alert alert-danger">Nenhum produto encontrado!!</h4> -->

<!-- <meta http-equiv="refresh" content = 1; url="<?php echo $_smarty_tpl->tpl_vars['PRODUTOS']->value;?>
">  qdo queremos dar um refresh via html utilizamos a tag meta com content = tempo em segundos e apontamos a direção na url -->

<?php }?>



       
    <!--  começa lista de produtos  ---->   
  <section id="produtos" >  
 
		<ul style="list-style: none" >
		    

		  
		      <div class="row" style="margin-left: -55px;">
                            

		       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>  <!-- aqui abrimos foreach do php entre chaves (observe que éssa é uma forma diferente de chamar comandos php sem o <?php echo '<?php ';
echo '?>';?>
)-->
		                                  <!-- $PRO vai receber o $produtos->GetItens() que é a lista de produtos , e cada item da lista de produto vai ser guardada em P -->
                                          <!-- o foreach vai percorrer todos os li. cada li vai conter os dados de um item (P)-->
                    <li class="col-md-4 col-6" style="padding-bottom: 20px;"> <!-- aqui vamos definir que cada li  col-md-4, ou seja, sera 3 li por linha-->

		            <?php if ($_smarty_tpl->tpl_vars['P']->value['pro_estoque'] > 0) {?>

					<?php if ($_smarty_tpl->tpl_vars['P']->value['pro_promocao'] != 0) {?>

					<div class="text-center" id="bolinhaOferta" style="background-color: red; width: 3em; height: 3em; border-radius: 100%; position: relative;top: 2em; color: white;line-height: 40px; margin-top: -39px; font-size: 0.8em;">Oferta</div>

		                <a href="<?php echo $_smarty_tpl->tpl_vars['PRO_INFO']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_slug'];?>
"> <!-- $PRO_INFO vem lá de produtos.php e a url fica http://localhost/lojaphp/produtos_info/1/camisa-social-->


		                    <img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img'];?>
" class = "img-fluid img-thumbnail mx-auto d-block" style="width: 290px;" alt="" > <!--$P.pro_img vai ter o caminho até a imagem-->
							<figcaption class = "figure-caption text-center text-primary font-weight-bold"> <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
</figcaption>
							<center>
							<table>
							<tr>
							<td>	
							<figcaption class = "figure-caption text-center text-secondary font-weight-bold" style="font-size:small;text-decoration: line-through;"> R$ <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_promocao'];?>
</figcaption>	
						    </td>
							<td>
							<figcaption class = "figure-caption text-center text-danger font-weight-bold" style="font-size:medium;"> R$ <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_valor'];?>
</figcaption>
						    </td>
						    </tr>
						    </table>
						   </center>

		                </a>

						<?php } else { ?>

						<a href="<?php echo $_smarty_tpl->tpl_vars['PRO_INFO']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_slug'];?>
"> <!-- $PRO_INFO vem lá de produtos.php e a url fica http://localhost/lojaphp/produtos_info/1/camisa-social-->


		                    <img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img'];?>
" class = "img-fluid img-thumbnail mx-auto d-block" style="width: 290px;" alt="" > <!--$P.pro_img vai ter o caminho até a imagem-->
							<figcaption class = "figure-caption text-center text-primary font-weight-bold"> <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
</figcaption>
							<figcaption class = "figure-caption text-center text-danger font-weight-bold" style="font-size:medium;"> R$ <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_valor'];?>
</figcaption>
		                    

		                </a>

						<?php }?>

		           <?php } else { ?>

				    <img src="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img'];?>
" class = "img-fluid img-thumbnail mx-auto d-block" style="width: 290px;" alt="" > <!--$P.pro_img vai ter o caminho até a imagem-->
		    		<figcaption class = "figure-caption text-center text-primary font-weight-bold"> <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
</figcaption>
					<figcaption class = "figure-caption text-center text-danger font-weight-bold" style="font-size:medium;"> R$ <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_valor'];?>
</figcaption>
					<div class="alert alert-danger text-center" role="alert" style="color: red;padding: 0%;">Produto esgotado</div>
				   <?php }?>


		        </li>
			

		        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  <!-- aqui fechamos foreach do php entre chaves (obs: mesmo o for não ficando delimitado , tudo que esta entre os dois comandos dor for vai passar na repetição)-->
		        
		         </div>
		         
		    
		</ul>
    
    </section>
    
    
     <!--  paginação inferior   -->  
    <section id="pagincao" class="row d-flex justify-content-center" >
    
    <?php echo $_smarty_tpl->tpl_vars['PAGINAS']->value;?>

    
    </section>

<?php }
}

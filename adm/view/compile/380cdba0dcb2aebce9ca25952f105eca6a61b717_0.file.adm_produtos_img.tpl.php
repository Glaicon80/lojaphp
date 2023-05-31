<?php
/* Smarty version 3.1.39, created on 2021-05-12 23:46:57
  from '/home1/meune445/loja.meunegocioweb.com/adm/view/adm_produtos_img.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_609c932188af05_63542997',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '380cdba0dcb2aebce9ca25952f105eca6a61b717' => 
    array (
      0 => '/home1/meune445/loja.meunegocioweb.com/adm/view/adm_produtos_img.tpl',
      1 => 1620863078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609c932188af05_63542997 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
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

            <input type="hidden" name="pro_id" value="<?php echo $_smarty_tpl->tpl_vars['PRO']->value;?>
">

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
                          

          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['IMAGES']->value, 'I');
$_smarty_tpl->tpl_vars['I']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['I']->value) {
$_smarty_tpl->tpl_vars['I']->do_else = false;
?>  <!-- aqui abrimos foreach do php entre chaves (observe que éssa é uma forma diferente de chamar comandos php sem o <?php echo '<?php ';
echo '?>';?>
)-->
                                    <!-- $PRO vai receber o $produtos->GetItens() que é a lista de produtos , e cada item da lista de produto vai ser guardada em P -->
                                        <!-- o foreach vai percorrer todos os li. cada li vai conter os dados de um item (P)-->
                  <li class="col-md-4 col-6" style="padding-bottom: 20px;"> <!-- aqui vamos definir que cada li  col-md-4, ou seja, sera 3 li por linha-->

              

                    <img src="<?php echo $_smarty_tpl->tpl_vars['I']->value['img_nome'];?>
" alt="" class = "img-fluid thumbnail mx-auto d-block" style="background-color: white;">
                    <br>

                    <label>Apagar?</label> 
                    <input type="checkbox" class=" input-lg" name="fotos_apagar[]" value="<?php echo $_smarty_tpl->tpl_vars['I']->value['img_arquivo'];?>
">   <!-- observe que o checkbox vai ser um array em name="fotos_apagar[] , isso é comum para checkbox" -->

              


          </li>
    

          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  <!-- aqui fechamos foreach do php entre chaves (obs: mesmo o for não ficando delimitado , tudo que esta entre os dois comandos dor for vai passar na repetição)-->
          
          

           </div>
           
           <input type="hidden" name="pro_id" value="<?php echo $_smarty_tpl->tpl_vars['I']->value['img_prod_id'];?>
"> <!-- vamos envia o id do produto -->
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
             <?php }
}

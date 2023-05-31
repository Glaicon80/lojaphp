<?php
/* Smarty version 3.1.39, created on 2022-12-03 16:17:47
  from 'C:\xampp\htdocs\lojaphp\view\produtos_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_638ba0db77cd01_13775844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '890fb6fc3862b52795cead07c3a61a4503f3ed8e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp\\view\\produtos_info.tpl',
      1 => 1620863547,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638ba0db77cd01_13775844 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- aqui vai o caminho para o arquivo CSS baguetteBox.min.css responsavel por carregar o zoom das fotos-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
<link rel="stylesheet" href="tema/css/gallery-grid.css">


<style>
#menuLateral{

display: none;

}

#topo {

min-height: 100px;
background-image: url("<?php echo $_smarty_tpl->tpl_vars['MEDIA']->value;?>
/images/fundoazul.png");

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

<?php echo '<script'; ?>
>
    $('#colunaCentral').removeClass('col-md-9 order-md-2');
    $('#colunaCentral').addClass(' col-md-12');
<?php echo '</script'; ?>
>

<br>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRO']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>


<section id="produtos" class="container">  

<div class="row" id="fotoGrande" >
    
  
    
        <div class="col-md-8 ">
            <div class="tz-gallery"> <!-- essa classe vei baguetteBox -->
                <a class="lightbox" href="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img_g'];?>
">
                    <img class = "img-fluid img-thumbnail mx-auto d-block" src="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_img_g'];?>
" alt="Park">
                </a>
            </div>
            
        </div>
        


   
	    <div class="col-md-4">
        
          <img class="mx-auto d-block" src="<?php echo $_smarty_tpl->tpl_vars['MEDIA']->value;?>
/images/logo-pagseguro.png" alt="">
  <hr>

  <h4 class="text-left"><?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
</h4>
  <h6 class="text-left" style="padding-bottom: 20px;">Ref: <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_ref'];?>
</h6>      
  <h6 class="text-left" style="padding-bottom: 20px;">
    
    <?php if ($_smarty_tpl->tpl_vars['P']->value['pro_estoque'] > 5) {?>
    Disponibilidade: Em estoque
    <?php } else { ?>
    Disponibilidade: <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_estoque'];?>
 Unidades
    <?php }?>
</h6>
        
        <div class="col-md-6" style="margin-left: -15px;">
           <h4 class="text-left text-primary">R$ <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_valor'];?>
</h4>   
            <br>
        </div>

        <hr>
        
        <form name="carrinho" method="post" action="<?php echo $_smarty_tpl->tpl_vars['PAG_COMPRAR']->value;?>
">
        <input type="hidden" name="pro_id" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['pro_id'];?>
">
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
         
         <?php if (count($_smarty_tpl->tpl_vars['IMAGES']->value) > 0) {?>
         
         <h4 class="text-left" id="tituloImagensExtras" >Mais imagens</h4>
         

        <br>
 
        
         <!-- aqui vai mostrar as imagens extras já com a propriedade de zoom e carrocel , eu copiei e colei da internet-->
        
        
         <div class="container gallery-container">
        
            <div class="tz-gallery">
    
                    <ul id="imagensExtras"  style="list-style: none" >
        
                        <div class="row d-flex justify-content-center">
    
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['IMAGES']->value, 'I');
$_smarty_tpl->tpl_vars['I']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['I']->value) {
$_smarty_tpl->tpl_vars['I']->do_else = false;
?>
                    <li class="col-md-4 col-6" >
                        <a class="lightbox" href="<?php echo $_smarty_tpl->tpl_vars['I']->value['img_link'];?>
">
                            <img class = "img-fluid img-thumbnail mx-auto d-block" src="<?php echo $_smarty_tpl->tpl_vars['I']->value['img_nome'];?>
" alt="Park">
                        </a>
                        <br>
                    </li>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
                </ul>
        
            </div>
        
        </div>


      
      <br>
      <?php }?>


            
        <div class="row">
           
        <div class="col-md-12 text-justify" id="descricao">
            <h4 class="text-left">Descrição do produto</h4>

            <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_desc'];?>
 

        </div>
        </div>  
            <br>
            <br>

      </section>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<!-- aqui vai o caminho para o arquivo javascript baguetteBox.min.js responsavel por carregar o zoom das fotos-->
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    baguetteBox.run('.tz-gallery');
<?php echo '</script'; ?>
>

<?php }
}

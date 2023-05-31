<?php
/* Smarty version 3.1.39, created on 2022-12-02 00:33:22
  from 'C:\xampp\htdocs\lojaphp\adm\view\adm_categorias.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_63897202b3dbc5_95366685',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb0f523fe70d4bd03a6ee67d363afe3a3f129fcb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp\\adm\\view\\adm_categorias.tpl',
      1 => 1620863074,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63897202b3dbc5_95366685 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
        
      
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CATEGORIAS']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
            <form name="categorias_editar" method="post" action="">
               
                <tr>

                    <td style="width: 70%">
                         <input type="text" name="cate_nome" value="<?php echo $_smarty_tpl->tpl_vars['C']->value['cate_nome'];?>
" class="form-control" required> 
                          <input type="hidden" name="cate_id" value="<?php echo $_smarty_tpl->tpl_vars['C']->value['cate_id'];?>
">
                    </td>
                       
                    <td>
                        <button class="btn btn-success" name="cate_editar" value="cate_editar">Editar</button> <!-- se clicar no botão editar vai existir um $_POST['cate_editar'] mas o $_POST['cate_apagar'] não vai existir-->
                    </td>
                   
                    <td>
                        <button class="btn btn-danger" name="cate_apagar" value="cate_apagar">Apagar</button> <!-- se clicar no botão Apagar vai existir um $_POST['cate_apagar'] mas o $_POST['cate_editar'] não vai existir-->
                    </td>


                </tr>        

            </form>
            
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        
    </table>

</div>


<div class="col-md-2"></div>
    
</section><?php }
}

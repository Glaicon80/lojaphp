<?php
/* Smarty version 3.1.39, created on 2021-05-05 09:48:33
  from 'C:\xampp\htdocs\lojaphp2\adm\view\adm_produtos_novo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6092942169de52_66307751',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02996d1e7eb01572f42d8623905027b650cbea54' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\adm\\view\\adm_produtos_novo.tpl',
      1 => 1620218910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6092942169de52_66307751 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/js/tinymce/tinymce.min.js"><?php echo '</script'; ?>
>  <!-- caminho do arquivo tinymce usado no textarea lá embaixo -->


<br>

<h4 class="text-left" style="margin-bottom: -10px;">Adicionar novo produto</h4>
<hr style="margin-bottom: 30px;">
  

<!-- começa os campos para form produto    -->

<section class="container" style="padding-left: 0%; padding-right: 0%;">

<form name="frm_produto" method="post" action=""  enctype="multipart/form-data"> <!--  enctype="multipart/form-data"  temos sempre que colocar essa informação aqui no form qdo vamos enviar arquivos (nosso caso as fotos) via formulario, se não, não envia -->

<section class="row" id="camposproduto">
                                           
   
        <div class="col-md-5" style="margin-bottom: 20px;">
            <label>Produto</label>
            <input type="text" name="pro_nome" id="pro_nome" class="form-control"  required >
            
        </div>
        
        
        
        <div class="col-md-4" style="margin-bottom: 20px;">

            <label>Categoria</label>
         
            <select name="pro_categoria" id="pro_categoria" class="form-control" required>
              
                <option value="teste"> Escolha </option>                           
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CATEGORIAS']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>                    
                <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['cate_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['C']->value['cate_nome'];?>
</option>  

                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>                
            </select>
            
            
        </div>   
        
        
        
        
           <div class="col-md-3 col-6" style="margin-bottom: 20px;">
            <label>Modelo</label>
            <input type="text" name="pro_modelo" id="pro_modelo" class="form-control"  >
            
        </div>
        
        
           <div class="col-md-3 col-6" style="margin-bottom: 20px;">
            <label>Referencia</label>
            <input type="text" name="pro_ref" id="pro_ref" class="form-control"  >
            
        </div>



          
        <div class="col-md-2 col-4" style="margin-bottom: 20px;">
            <label>Ativo</label>
            <select name="pro_ativo" id="pro_cativo" class="form-control" required>
              
                <option value=""> Escolha </option>
                <option value="NAO"> Não </option>
                <option value="SIM"> Sim </option>
                
            </select>
            
            
        </div>
        
        
        
           <div class="col-md-2 col-4" style="margin-bottom: 20px;">
            <label>Valor</label>
            <input type="text" name="pro_valor" id="pro_valor" class="form-control" required >
            
        </div>

        <div class="col-md-3 col-4" style="margin-bottom: 20px;">
          <label>Promoção</label>
          <input type="text" name="pro_promocao" id="pro_promocao" class="form-control">
          
      </div>
        
        
        
           <div class="col-md-2 col-4" style="margin-bottom: 20px;">
            <label>Peso</label>
            <input type="text" name="pro_peso" id="pro_peso" class="form-control" required >
            
          </div>
        
        
           <div class="col-md-2 col-4" style="margin-bottom: 20px;">
            <label>Altura</label>
            <input type="text" name="pro_altura" id="pro_altura" class="form-control" required >
            
          </div>


          <div class="col-md-3 col-4" style="margin-bottom: 20px;">
            <label>Comprimento</label>
            <input type="text" name="pro_comprimento" id="pro_comprimento" class="form-control" required >
            
          </div>
        
        
           <div class="col-md-2 col-4" style="margin-bottom: 20px;">
            <label>Largura</label>
            <input type="text" name="pro_largura" id="pro_largura" class="form-control" required >
            
           </div>


          <div class="col-md-2 col-4" style="margin-bottom: 20px;">
            <label>Estoque</label>
            <input type="text" name="pro_estoque" id="pro_estoque" class="form-control" required >
            
          </div>


          <div class="col-md-3 col-4" style="margin-bottom: 20px;">
            <label>Stq Min</label>
            <input type="text" name="pro_stq_min" id="pro_stq_min" class="form-control" required >
            
          </div>
        
       
        <div class="col-md-12" style="margin-bottom: 20px; margin-left: -15px;">
            
            <div class="col-md-3" style="background-color: aquamarine;">  
            </div>
            
            <div class="col-md-6">
            
                 
                 <label>Imagem Principal</label>
                 <input type="file" name="pro_img" class="form-control-file" id="pro_img">
            </div>
            
            <div class="col-md-3">                     
            </div>
            

            
        </div>
        
        
        
           <div class="col-md-12" style="margin-bottom: 20px;">
            <label>Descrição</label>
           
            <textarea name="pro_desc" id="pro_desc" rows="5" class="form-control" ></textarea>

              <?php echo '<script'; ?>
> 
              tinymce.init({ selector:'textarea'  }); // tem um arquivo que foi baixado da internet que chama tinymce. Ele esta na pasta view/tema/js/tinymce
              <?php echo '</script'; ?>
>                               <!-- com esse arquivo o textarea vai ficar muito mais funcional e estilizado -->
          
        
          
          </div>

        
        <!-- botão gravar -->
    
      
            
            <div class="col-md-4">

            </div>

            <div class="col-md-4">
                <br>
                <button class="btn btn-success btn-block btn-lg" name="btn_gravar"> Gravar </button>
            </div>

            <div class="col-md-4">

            </div>
    
    
    
    
</section>

</form>

</section>

<br>
<br>
<br>
<br>


<?php }
}

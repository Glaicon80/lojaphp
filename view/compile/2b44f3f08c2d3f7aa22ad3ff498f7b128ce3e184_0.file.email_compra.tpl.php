<?php
/* Smarty version 3.1.39, created on 2021-05-04 09:52:27
  from 'C:\xampp\htdocs\lojaphp2\view\email_compra.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6091438b5a7b13_91651641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b44f3f08c2d3f7aa22ad3ff498f7b128ce3e184' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\view\\email_compra.tpl',
      1 => 1620132689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6091438b5a7b13_91651641 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
  .tabela {
      border-collapse: collapse; /* vai eliminar as bordas das colunas ficando as bordas dos extremos */
      width: 100%;
  }
  
  .tabela th, td {
      text-align: left;
      padding: 8px;
  }
  
  .tabela tr:nth-child(odd){
    background-color: #b2b2b2;
  }
  
  .sessao{
    
    padding:20px;
  }
  
  
  .total{
    text-align:right;
  }
  
  .frete{
    text-align:right;
  }
  
  .totalfrete{
    text-align:right;
    font-size:18px;
    font-style: bold;
    color:#062a46;
  }
  
  
  
  
  
  .textoinicio{
    text-align:center;
  }
  
  .minhaconta{
    text-align:center;
  }
  
  
  </style>
  
  <p style="text-align:center;"> Olá <?php echo $_smarty_tpl->tpl_vars['NOME_CLIENTE']->value;?>
 , obrigado pela sua compra na <?php echo $_smarty_tpl->tpl_vars['SITE_NOME']->value;?>
 <br>
  <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_HOME']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['SITE_HOME']->value;?>
 </a>
  </p>


  <p style="text-align:center;"> Estatus do pedito:<span style="font-size:15px;font-style: bold;color:#062a46;"><?php echo $_smarty_tpl->tpl_vars['STATUS']->value;?>
</span></p>
  
  
    <section class="row">
        <p style="text-align:center;">
            Para acessar a sua conta e ter um histórico de seus pedidos acesse nosso site, e sua conta<br>
            <a  href="<?php echo $_smarty_tpl->tpl_vars['PAG_MINHA_CONTA']->value;?>
" > Minha conta: <?php echo $_smarty_tpl->tpl_vars['PAG_MINHA_CONTA']->value;?>
 </a>
        
        </p>                 
                     
    </section>
  
  
  <section class="row ">
     
      <center>
        
       
     <br>
          
      <table style="width: 100%; border-collapse: collapse;">
       
          <tr style="
              border: 1px solid #b2dba1; 
              
              background-color: #072339;
              color:#FFF;
              font-size:18px;" >
  
            <td colspan="5">Itens do seu pedido </td> <!--colspan vai espandir o td para 5 colunas para bater com as de baixo -->
          </tr>

         <?php echo $_smarty_tpl->tpl_vars['LISTADEITENS']->value;?>

          
         </table>
    
      </center>
          
             
  </section><!-- fim da listagem itens -->
  
  
     <!-- botoes de baixo e valor total -->
          <div class="sessao">
                        
              
  
                 <p style="text-align:right;">
                 <b>Total :</b> R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>

                 </p>
                 <p style="text-align:right;">
                 <b>Frete</b> : R$ <?php echo $_smarty_tpl->tpl_vars['FRETE']->value;?>

                 </p>
                 <p style="text-align:right;
                           font-size:18px;
                           font-style: bold;
                           color:#062a46;">
                 <b>Final : R$ <?php echo $_smarty_tpl->tpl_vars['TOTAL_FRETE']->value;?>
</b>
                 </p>
  
              
            <!-- Os email não aceitam o bootstrap e o gmail tbm não aceitou o css chamado pelas classes
             para fazer a formatação no gmail tive que colocar o style das tags html-->  
              
          </div>
                 <br>
               <?php }
}

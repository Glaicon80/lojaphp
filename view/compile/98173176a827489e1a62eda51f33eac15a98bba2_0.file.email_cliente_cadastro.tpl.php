<?php
/* Smarty version 3.1.39, created on 2021-05-13 20:44:58
  from '/home1/meune445/loja.meunegocioweb.com/view/email_cliente_cadastro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_609db9fa5ec382_41732965',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98173176a827489e1a62eda51f33eac15a98bba2' => 
    array (
      0 => '/home1/meune445/loja.meunegocioweb.com/view/email_cliente_cadastro.tpl',
      1 => 1620863544,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609db9fa5ec382_41732965 (Smarty_Internal_Template $_smarty_tpl) {
?><h3>Olá <?php echo $_smarty_tpl->tpl_vars['NOME']->value;?>
 , obrigado por se cadastrar em <?php echo $_smarty_tpl->tpl_vars['SITE']->value;?>
</h3>

<p> Cadastro efetuado com sucesso,  para fazer  o login use seu email cadastrado ( <?php echo $_smarty_tpl->tpl_vars['EMAIL']->value;?>
 )
<br>
com a sua senha. Sua senha neste momento é ( <?php echo $_smarty_tpl->tpl_vars['SENHA']->value;?>
 ), ela pode ser alterada após seu primeiro acesso.

</h3>
<p>
    Para acessar o site e sua conta basta usar este endereço <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_MINHA_CONTA']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['PAG_MINHA_CONTA']->value;?>
</a>
    
</p>
<?php }
}

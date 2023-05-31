<?php
/* Smarty version 3.1.39, created on 2021-05-08 00:43:01
  from 'C:\xampp\htdocs\lojaphp2\view\texte.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_609608c58cf264_23953545',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '213d4cfc9ff05a8b91f71e303588b211e4c99fe1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\view\\texte.tpl',
      1 => 1620445379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609608c58cf264_23953545 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/js/jquery.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/contatos/contatos.js" type="text/javascript"><?php echo '</script'; ?>
>
<link href="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/contatos/contatos.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" >

<style>
    body{ 
  background-image: url(media/images/baner.jpg); 
  background-size: cover;
  background-attachment: fixed;
  
}
.content{

    position:absolute;
    background:white;
    top: 20em;
    width: 100%;
    height: 39em;
    padding: 40px;
    margin: 100px auto;
}




.sidebar-nav {
position:relative;
top: 0;
margin: 0;
margin-left: -40px;
padding: 0;
width: 200px;
list-style: none;
}
.sidebar-nav li {
font-size: 18px;
text-indent: 55px;
line-height: 40px;
}
.sidebar-nav li a {
color:black;
display: block;
text-decoration: none;
}
.sidebar-nav li a:hover {
background: #556ea5;
color: white;
text-decoration: none;
}
.sidebar-nav li a:active, .sidebar-nav li a:focus {
text-decoration: none;
}


#sidebar-wrapper.sidebar-toggle {
transition: all 0.3s ease-out;
margin-left: -200px;
}


@media (min-width: 768px) {
#sidebar-wrapper.sidebar-toggle {
    transition: 0s;
    left: 200px;
}
}


@media (max-width: 768px) {
  #logoSite {
    margin-top: 15px;
}
}


footer {
background-color: rgb(52, 58, 64);
color: white;
}

#topo {

min-height: 100px;
background-color: #204d74;
color: #fff;

}

#rodape {

min-height: 150px;
background-color: #204d74;
color: #fff;
padding-top: 30px;
}

.thumbnail{

border-radius: 10px;
box-shadow: 1px 1px 5px #adadad;
padding-left: 10px;
padding-bottom: 5px;
padding-top: 5px;
}


.thumbnail1{

border-radius: 10px;
box-shadow: 1px 1px 5px #adadad;

}

.meio-pag {
color: white;
}



#bola {
display: none;
}




#bola4 {
padding-left: 15px;
padding-right: 15px;
}

#spinner {
display: none;
position: fixed;
border: 8px solid rgba(0, 0, 0, .1);
border-radius: 50%;
border-left-color: #22a6b3;
left: 40%;
top: 50%;
height: 60px;
width: 60px;
animation: spin 1s linear infinite;
/* vai inserir a animação */
}
</style>

</head>
<body>

      <!-- começa  o container geral -->
  <div class="container-fluid">

    <!-- começa a div topo -->
    <div class="row" id="topo" style="padding: 20px; background-color: rgba(39, 80, 161, 0.2);">


      <div class="container">

        <div class="row">

          <div class="col-8" id="logoSite">

            <img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['MEDIA']->value;?>
/images/logoletraamarela.png" alt="">

          </div>



          <div class="col-4 text-right">

            <?php if ($_smarty_tpl->tpl_vars['LOGADO']->value == true) {?>

            Olá <?php echo $_smarty_tpl->tpl_vars['USER']->value;?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_LOGOFF']->value;?>
" class= "btn btn-info btn-sm"><i class="fas fa-door-closed"></i> Sair</a>

            <?php }?>

          </div>

        </div>

      </div>



    </div><!-- fim da div topo -->

<!-- começa a div menu -->
    <div class="row" id="menuTelaGrande" style="background-color: rgba(39, 80, 161, 0.2);">

      <div class="col-md-12" >

      <nav class="navbar navbar-expand-lg navbar-dark" >

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['GET_HOME']->value;?>
"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['PAG_PRODUTO']->value;?>
"><i class="fas fa-tag"></i> Produtos</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['PAG_MINHACONTA']->value;?>
"><i class="fas fa-user-alt"></i> Minha Conta</a>
            </li>


            <li class="nav-item active">
              <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['PAG_CARRINHO']->value;?>
"><i class="fas fa-shopping-cart"></i> Carrinho</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['PAG_CONTATO']->value;?>
"><i class="fas fa-envelope"></i> Contato</a>
            </li>


          </ul>

          

        </div>

      </nav>

      </div>
    </div>
   </div>


    <h1 style="margin-top:15%;margin-left: 10%; position: fixed;">bola corre igual doida </h1>

    <div  class="content" style="padding:0px">

        <div>

            <h1 style="margin-left: 5%;">bola corre igual doida </h1>
        </div>


          <!-- começa div rodape -->
    <div class="row" id="rodape">

      <div class="col-md-3"></div>

      <div class="col-md-6">

       <!----> <h4 class="text-center"><!--<?php echo '<?php ';?>
echo Config::SITE_NOME; <?php echo '?>';?>
--></h4>

       <P class="text-center">Todos os direitos reservados - glaicon florisbelo Alves - <?php echo $_smarty_tpl->tpl_vars['DATA']->value;?>
</P>


      </div>

      <div class="col-md-3"></div>
    </div><!-- fim div rodape-->
   
  </div> <!-- fim do container geral -->

</body>

</html>

    </div>
    
</body>
</html><?php }
}

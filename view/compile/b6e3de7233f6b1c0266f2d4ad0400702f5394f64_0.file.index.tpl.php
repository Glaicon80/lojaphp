<?php
/* Smarty version 3.1.39, created on 2021-05-11 10:24:17
  from 'C:\xampp\htdocs\lojaphp2\view\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_609a85815a11f4_56025006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6e3de7233f6b1c0266f2d4ad0400702f5394f64' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\view\\index.tpl',
      1 => 1620739455,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609a85815a11f4_56025006 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>

<html>

<head>
  <title><?php echo $_smarty_tpl->tpl_vars['TITULO_SITE']->value;?>
</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
          <!--<?php echo '<script'; ?>
 src="personalizado.js"><?php echo '</script'; ?>
>-->




  <style>

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

        #logoSite {
           
            margin-left: -7.5%;
        }
        }


        @media (max-width: 768px) {
          #logoSite {
            margin-top: 7px;
            margin-left: -0%;
        }
        #menuTelaGrande{
          margin-left: -7%;

        }
        }


    footer {
      background-color: rgb(52, 58, 64);
      color: white;
    }

    #topo {

      min-height: 100px;
      background-image: url("./media/images/fundoazul.png");
      
      color: #fff;

    }

    #rodape {

      min-height: 150px;
      background-color: #000000;
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
    <div class="row" id="topo" style="padding-top: 20px;">


      <div class="container">

        <div class="row">

          <div class="col-9" id="logoSite">

            <img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['MEDIA']->value;?>
/images/logoletraamarela.png" alt="">

          </div>



          <div class="col-3 text-right">

            <?php if ($_smarty_tpl->tpl_vars['LOGADO']->value == true) {?>

            <?php echo $_smarty_tpl->tpl_vars['USER']->value;?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_LOGOFF']->value;?>
" class= "btn btn-info btn-sm"><i class="fas fa-door-closed"></i> Sair</a>

            <?php }?>

          </div>

        </div>

      </div>



    </div><!-- fim da div topo -->

<!-- começa a div menu -->
    <div class="row" id="menuTelaGrande" style="background-color:rgb(10, 94, 179);">

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

    <!-- fim da div menu -->


    <div class="row" style="background-color:rgb(248, 249, 250);">


      <!-- coluna direita CONYEUDO CENTRAL -->
      <div class="col-md-9 order-md-2" id="colunaCentral" >

        
        <?php 
        Rotas::get_Pagina();
        
        ?>


      

             <!-- modal alerta-->
          <!-- overflow-y:scroll é para rolagem-->
          <div class="modal fade" id="modalAlerta1"  tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">

          <div class="modal-dialog">

          <div class="modal-content">

        <!-- agora que a div do modal começa, as anteriores eram para configurações-->
        <!-- modal-header é o cabeçaçho-->
        <div class="modal-header" style="padding: 35px 50px;">

            <h4 style="color: #448ed3;">Alerta</h4>

        </div>

        <!-- modal-body é o corpo-->

        <div class="modal-body" style="padding: 40px 50px;">

       <label id="alertaMensagem1">Erro ao tentar abrir</label>

        </div>
    
        <!-- rodape-->

        <div class="modal-footer">
                
            <button type="button" class="btn btn-default"  onclick="goBack()" data-dismiss="modal">OK</button>
            
        </div>

    </div>

 </div>

</div>

          <div id="spinner"></div>

          
        </div>

        <!-- finm coluna do centro -->

        
      <!-- coluna da esquerda-direita -->
      <div class="col-md-3 bg-light" id="menuLateral" >
        <!--SideNav-->
        
        
        
          <div class="col-md-11 mb-3" style="padding-top: 20px; padding-bottom: 20px;">
            <form class="navbar-form navbar-right" method="POST" action="" role="search">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" style="padding:0%"><button type="submit" class="btn btn-link btn-sm" >Pesquisar</button></span>
              </div>
              <input type="text" name="txt_buscar" class="form-control"  required>
            </div>
          </form>
          </div>



        
          <div class="col-md-6 mb-3">
        
            <h4>Categorias</h4>
        
          </div>
        
          <div class="row">
              <ul class="sidebar-nav">

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CATEGORIAS']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?> <!-- aqui vai pegar a lista de categorias ($CATEGORIAS) e cada categoria vai ser jogada em C uma por vez no loop-->
                <li style="width: 150%; margin-left: -40px;">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['C']->value['cate_link'];?>
" ><i class="fas fa-angle-right"></i> <?php echo $_smarty_tpl->tpl_vars['C']->value['cate_nome'];?>
</a> 
                </li>  
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </ul>
          </div>

          <div class="row">

            <img class = "img-fluid" src="./media/images/homem.png" alt="">
          </div>
        
        
              </div> <!-- finm coluna esquerda -->


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

</html><?php }
}

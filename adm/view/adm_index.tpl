<!DOCTYPE html>

<html>

<head>
  <title>{$TITULO_SITE}</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="{$GET_TEMA}/tema/js/jquery.js" type="text/javascript"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" >
        




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
        }


        @media (max-width: 768px) {
          #logoSite {
            margin-top: 15px;
            margin-bottom: 20px;
        }
        }


    footer {
      background-color: rgb(52, 58, 64);
      color: white;
    }

    #topoadm{

    min-height: 100px;
    background-color: #7c2125;
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
    <div class="row" id="topoadm" style="padding: 20px;">


      <div class="container">

        <div class="row">

          <div class="col-md-8 col-12" id="logoSite">

            <img class="img-fluid" src="{$MEDIA}/images/logoadm.png" alt="">

          </div>

  

          <div class="col-md-4 col-12 text-md-right">

            {if $LOGADO == true}

            Olá {$USER} <a href="{$PAG_LOGOFF}" class= "btn btn-info btn-sm"><i class="fas fa-door-closed"></i> Sair</a>
            <a href="{$PAG_SENHA}" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-asterisk"></i>Alterar Senha</a>
            <br><br>
            <h6><p>Logado em: {$DATA} ás {$HORA}</p></h6>
            
            {/if}

          </div>

        </div>

      </div>



    </div><!-- fim da div topo -->

<!-- começa a div menu -->
    <div class="row" id="menuTelaGrande" style="background-color:rgb(52, 58, 64);">

      <div class="col-md-12" >

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{$GET_SITE_ADM}"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{$PAG_CATEGORIAS}"><i class="fas fa-align-justify"></i> Categorias</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="{$PAG_ADM_PRODUTOS}"><i class="fas fa-tag"></i> Produtos</a>
            </li>


            <li class="nav-item active">
              <a class="nav-link" href="{$PAG_ADM_CLIENTE}"><i class="fas fa-user-alt"></i> Clientes</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="{$PAG_ADM_PEDIDOS}"><i class="fas fa-gift"></i> Pedidos</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="{$PAG_ADM_VENDAS}"><i class="fas fa-book-open"></i> Gerenciamento</a>
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

        
        {php}
        Rotas::get_PaginaAdm();
        
        {/php}


      

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
           
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Pesquisar</span>
              </div>
              <input type="text" name="text" id="email" class="form-control">
            </div>
          </div>
        
          <div class="col-md-6 mb-3">
        
            <h4>Categorias</h4>
        
          </div>
        
          <div class="row">
              <ul class="sidebar-nav">

                {foreach from = $CATEGORIAS item = C} <!-- aqui vai pegar a lista de categorias ($CATEGORIAS) e cada categoria vai ser jogada em C uma por vez no loop-->
                <li style="width: 150%; margin-left: -40px;">
                    <a href="{$C.cate_link}" ><i class="fas fa-angle-right"></i> {$C.cate_nome}</a> 
                </li>  
                    {/foreach}
              </ul>
          </div>
        
        
              </div> <!-- finm coluna esquerda -->


   </div>





    <!-- começa div rodape -->
    <div class="row" id="rodape">

      <div class="col-md-3"></div>

      <div class="col-md-6">

       <!----> <h4 class="text-center"><!--<?php echo Config::SITE_NOME; ?>--></h4>

       <P class="text-center">Todos os direitos reservados - glaicon florisbelo Alves - {$DATA}</P>


      </div>

      <div class="col-md-3"></div>
    </div><!-- fim div rodape-->
   
  </div> <!-- fim do container geral -->

</body>

</html>
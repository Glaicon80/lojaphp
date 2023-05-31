

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="{$GET_TEMA}/tema/js/jquery.js" type="text/javascript"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{$GET_TEMA}/tema/contatos/contatos.js" type="text/javascript"></script>
<link href="{$GET_TEMA}/tema/contatos/contatos.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" >



<style>
    body{ 
  background-image: url(media/images/baner.jpg); 
  background-repeat: repeat;
  background-size: cover;
  background-attachment: fixed;
  background-position: 65% top;
  
}
.content{

    position:absolute;
    background:white;
    top: 20em;
    width: 100%;
    padding: 40px;
    margin: 100px auto;
}



/* efeito de aumentar e voltar nas imagens, colei da internet*/
.efeito-grow {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px transparent;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: transform;
  transition-property: transform;
}
.efeito-grow:hover, .efeito-grow:focus, .efeito-grow:active{
  -webkit-transform: scale(1.1);
  transform: scale(1.1);

}




/* animaçao fazendo o h1 aparecer da esquerda*/
h1 {
  animation-duration: 2s;
  animation-name: slidein;
  animation-iteration-count:initial;
  animation-direction:alternate;
}

     /* o keyframe vai fazer o efeito da do h1 vindo*/   
        @keyframes slidein {
  from {
    margin-left: -50%;
    width: 60%
  }

  to {
    margin-left: 5%;
    width: 70%;
  }
}


.almentar {
  animation-duration: 2s;
  animation-name: slidein2;
  animation-iteration-count:initial;
  animation-direction:alternate;
}







@media (min-width: 768px) {
        #sidebar-wrapper.sidebar-toggle {
            transition: 0s;
            left: 200px;
        }

        #logoSite {
            margin-left: 0px;
        }


        /* o keyframe vai fazer o efeito das imagens almentar*/
        @keyframes slidein2 {
  from {
    
    width: 50%
  }

  to {
   
    width: 69%;
  }
}

        }


        @media (max-width: 768px) {
          #logoSite {
            margin-top: 15px;
        }
        
        #mensagemTitulo{
       
        font-size: 24pt;
            
        }

        #logado{

          margin-left: -40%;
        }
        #containerTopo {
      margin-top:-7%;
      margin-left: -7%;
      width: 107%;

}
   
        @keyframes slidein2 {
  from {
    
    width: 50%
  }

  to {
   
    width: 100%;
  }
}
        }




footer {
background-color: rgb(52, 58, 64);
color: white;
}

#topo {

min-height: 100px;
color: #fff;
margin: 0px;
padding: 20px; 
background-color: rgba(39, 80, 161, 0.2);

}

#rodape {

min-height: 150px;
background-color: #000000;
color: #fff;
padding-top: 30px;
margin-right: -10px
}

.thumbnail{

border-radius: 10px;
box-shadow: 0px 0px 10px #adadad;
padding-left: 10px;
padding-bottom: 5px;
padding-top: 5px;
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


</style>

</head>
<body>

      <!-- começa  o container geral -->
  <div class="container-fluid" style="padding: 0%;" id="containerTopo">

    <!-- começa a div topo -->
    <div class="row" id="topo" >

          <div class=" col-md-8 col-11 col order-md-1 order-1" id="logoSite">

            <img class="img-fluid" src="{$MEDIA}/images/logoletraamarela.png" alt="">

          </div>


          
          

      <div class="col-md-12 col-8 col order-md-3 order-2" style="margin-top: 10px;margin-left: -10px;" >

      <nav class="navbar navbar-expand-lg navbar-dark" >

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{$GET_HOME}"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{$PAG_PRODUTO}"><i class="fas fa-tag"></i> Produtos</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="{$PAG_MINHACONTA}"><i class="fas fa-user-alt"></i> Minha Conta</a>
            </li>


            <li class="nav-item active">
              <a class="nav-link" href="{$PAG_CARRINHO}"><i class="fas fa-shopping-cart"></i> Carrinho</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="{$PAG_CONTATO}"><i class="fas fa-envelope"></i> Contato</a>
            </li>


          </ul>

          

        </div>

      </nav>

      </div>



      <div class="col-md-4 col-4 text-right col order-md-2 order-3" id="logado">

        {if $LOGADO == true}

        {$USER} <a href="{$PAG_LOGOFF}" class= "btn btn-info btn-sm"><i class="fas fa-door-closed"></i> Sair</a>

        {/if}

      </div>

      
    
   </div>

  </div>

    <h1 id="mensagemTitulo" style="width: 60%; margin-top:5%;margin-left: 5%; position: fixed;color: white;">Loja de Teste, produtos fictícios!</h1>

    <div  class="container-fluid content bg-light" style="padding:10px;padding-bottom: 0%;">

      
      <ul style="list-style: none;"  >
      
      <div class="row" style="margin-left: -50px; margin-right: -10px ;margin-top: -50px;">
                            

        {foreach from=$PRO item=P}  <!-- aqui abrimos foreach do php entre chaves (observe que éssa é uma forma diferente de chamar comandos php sem o <?php ?>)-->
                                   <!-- $PRO vai receber o $produtos->GetItens() que é a lista de produtos , e cada item da lista de produto vai ser guardada em P -->
                                       <!-- o foreach vai percorrer todos os li. cada li vai conter os dados de um item (P)-->
                 <li class="col-md-4 col-6" style="padding-bottom: 20px;"> <!-- aqui vamos definir que cada li  col-md-4, ou seja, sera 3 li por linha-->

             {if $P.pro_estoque > 0}

       {if $P.pro_promocao != 0}

       <div class="text-center" style="background-color: red; width: 3em; height: 3em; border-radius: 100%; position: relative;top: 2em;left: 81%; color: white;line-height: 40px; margin-top: -39px; font-size: 0.8em; z-index: 1;">Oferta</div>

                 <a href="{$PRO_INFO}/{$P.pro_id}/{$P.pro_slug}"> <!-- $PRO_INFO vem lá de produtos.php e a url fica http://localhost/lojaphp/produtos_info/1/camisa-social-->


                     <img src="{$P.pro_img}" class = "img-fluid img-thumbnail mx-auto d-block thumbnail efeito-grow efeito-grow2 almentar" style="width: 290px;" alt="" > <!--$P.pro_img vai ter o caminho até a imagem-->
           <figcaption class = "figure-caption text-center text-primary font-weight-bold"> {$P.pro_nome}</figcaption>
           <center>
           <table>
           <tr>
           <td>	
           <figcaption class = "figure-caption text-center text-secondary font-weight-bold" style="font-size:small;text-decoration: line-through;"> R$ {$P.pro_promocao}</figcaption>	
             </td>
           <td>
           <figcaption class = "figure-caption text-center text-danger font-weight-bold" style="font-size:medium;"> R$ {$P.pro_valor}</figcaption>
             </td>
             </tr>
             </table>
            </center>

                 </a>

         {else}

         <a href="{$PRO_INFO}/{$P.pro_id}/{$P.pro_slug}"> <!-- $PRO_INFO vem lá de produtos.php e a url fica http://localhost/lojaphp/produtos_info/1/camisa-social-->


                     <img src="{$P.pro_img}" class = "img-fluid img-thumbnail mx-auto d-block thumbnail efeito-grow efeito-grow2 almentar" style="width: 290px;" alt="" > <!--$P.pro_img vai ter o caminho até a imagem-->
           <figcaption class = "figure-caption text-center text-primary font-weight-bold"> {$P.pro_nome}</figcaption>
           <figcaption class = "figure-caption text-center text-danger font-weight-bold" style="font-size:medium;"> R$ {$P.pro_valor}</figcaption>
                     

                 </a>

         {/if}

            {else}

         <img src="{$P.pro_img}" class = "img-fluid img-thumbnail mx-auto d-block thumbnail efeito-grow efeito-grow2 almentar" style="width: 290px;" alt="" > <!--$P.pro_img vai ter o caminho até a imagem-->
         <figcaption class = "figure-caption text-center text-primary font-weight-bold"> {$P.pro_nome}</figcaption>
       <figcaption class = "figure-caption text-center text-danger font-weight-bold" style="font-size:medium;"> R$ {$P.pro_valor}</figcaption>
       <div class="alert alert-danger text-center" role="alert" style="color: red;padding: 0%;">Produto esgotado</div>
        {/if}


         </li>
   

         {/foreach}  <!-- aqui fechamos foreach do php entre chaves (obs: mesmo o for não ficando delimitado , tudo que esta entre os dois comandos dor for vai passar na repetição)-->
         
          </div>
      </ul>

 
   

          <!-- começa div rodape -->
    <div class="row" id="rodape">

      <div class="col-md-3"></div>

      <div class="col-md-6">

     

       <P class="text-center">Todos os direitos reservados - glaicon florisbelo Alves - {$DATA}</P>


      </div>

      <div class="col-md-3"></div>
    </div><!-- fim div rodape-->

    
   

  </div> 

</body>

</html>

   
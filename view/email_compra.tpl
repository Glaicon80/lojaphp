<!-- NAO ESTOU USANDO ESTE TEMPLATE POIS NÃO CONSIGO CARREGAR A IMAGEM-->

<style>
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
  
  <p style="text-align:center;"> Olá {$NOME_CLIENTE} , obrigado pela sua compra na {$SITE_NOME} <br>
  <a href="{$SITE_HOME}"> {$SITE_HOME} </a>
  </p>


  <p style="text-align:center;"> Estatus do pedito:<span style="font-size:15px;font-style: bold;color:#062a46;">{$STATUS}</span></p>
  
  
    <section class="row">
        <p style="text-align:center;">
            Para acessar a sua conta e ter um histórico de seus pedidos acesse nosso site, e sua conta<br>
            <a  href="{$PAG_MINHA_CONTA}" > Minha conta: {$PAG_MINHA_CONTA} </a>
        
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

         {$LISTADEITENS}
          
         </table>
    
      </center>
          
             
  </section><!-- fim da listagem itens -->
  
  
     <!-- botoes de baixo e valor total -->
          <div class="sessao">
                        
              
  
                 <p style="text-align:right;">
                 <b>Total :</b> R$ {$TOTAL}
                 </p>
                 <p style="text-align:right;">
                 <b>Frete</b> : R$ {$FRETE}
                 </p>
                 <p style="text-align:right;
                           font-size:18px;
                           font-style: bold;
                           color:#062a46;">
                 <b>Final : R$ {$TOTAL_FRETE}</b>
                 </p>
  
              
            <!-- Os email não aceitam o bootstrap e o gmail tbm não aceitou o css chamado pelas classes
             para fazer a formatação no gmail tive que colocar o style das tags html-->  
              
          </div>
                 <br>
               
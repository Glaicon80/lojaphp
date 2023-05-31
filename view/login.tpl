{if $LOGADO == true}


{else}

<style>

    
.thumbnail{

border-radius: 4px;
box-shadow: 0px 0px 6px #adadad;
}
</style>


<section class="container">

<section class="row" id="fazerlogin" >

   
    
        <div class="col-md-2 text-center" >
        
    
           
                
          
        
        </div>
     
        <!---  aqui estão os campos -->
        <div class="col-md-4 thumbnail" style="background-color: white; margin-top: 20px;margin-bottom: 20px;margin-left: 15px;margin-right: 15px; padding: 20px;" >
           
            <form name="cliente_login" method="post" action="" >
     
            <div class="form-group"> 
                <label></i> Email: </label>
                <input type="email"  class="form-control " name="txt_email" value="" placeholder="Digite seu email" required autocomplete="off">        

            </div>


            <div class="form-group"> 
                 <label> Senha: </label>
                 <input type="password"  class="form-control " name="txt_senha" value="" placeholder="Digite sua senha" required>        
           
            </div>


            <div class="form-group"> 
                
                <button type="submit" class="btn btn-geral btn-block btn-primary"><i class="fas fa-sign-in-alt"></i> Entrar </button>
                
            </div>
            <div class="form-group"> 
                
                <a href="{$PAG_CADASTRO}" class="btn btn-secondary btn-sm" style="width: 45%;"><i class="fas fa-pencil-alt"></i> Cadastrar</a>
             
                
                <a href="{$PAG_RECOVERY}" class="btn btn-secondary btn-sm" style="width: 53%; margin-right: -10px;"><i class="fas fa-question"></i> Esqueci a Senha</a>
           
                
                
            </div>

        </form>
        </div><!-- fim dos campos -->


        <div class="col-md-6 text-center" > 
        
      
        </div>
    
    
    
    
</section>
</section>



{/if}
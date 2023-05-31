<br>
<br>


<h4 class="text-left" style="margin-left: 15px;margin-bottom: -10px;">Cadastro de cliente</h4>

<hr style="margin-left: 15px; margin-right: 15px;">


<form name="cadcliente" id="cadcliente" method="post" action="">

<section class="row" id="cadastro" style="margin-left: 0px; margin-right: 0px;"> 

  
    <div class="col-md-4 col-6">
        <label>Nome:</label>
        <input type="text" name="cli_nome" value="{$NOME}" class="form-control" minlength="3" required>
        
        
    </div>
    
    <div class="col-md-4 col-6">
        <label>Sobrenome:</label>
        <input type="text"  name="cli_sobrenome" value="{$SOBRENOME}" class="form-control"  minlength="3" required>
        
        
    </div>
    
  
    <div class="col-md-3">
        <label>Data Nasc:</label>
        <input type="date"  name="cli_data_nasc" value="{$DATA}" class="form-control" required>
        
        
    </div>
    
  
    <div class="col-md-2 col-6">
        <label>RG:</label>
        <input type="text"  name="cli_rg" value="{$RG}" class="form-control" required>
        
        
    </div>
    
  
    
    <div class="col-md-2 col-6">
        <label>CPF:</label>
        <input type="number"  name="cli_cpf" value="{$CPF}" class="form-control" required> 
        
        
    </div>
    
  
    
    <div class="col-md-2 col-4">
        <label>DDD:</label>
        <input type="number"  name="cli_ddd" value="{$DDD}" class="form-control"  min="10" max="99" required>
        
        
    </div>
    
  
    
    <div class="col-md-3 col-8">
        <label>Fone:</label>
        <input type="number" name="cli_fone" value="{$FONE}" class="form-control" required>
        
        
    </div>
    
  
    
    <div class="col-md-3">
        <label>Celular:</label>
        <input type="number" name="cli_celular" value="{$CELULAR}" class="form-control" required>
        
        
    </div>
            
    
    
    <div class="col-md-6">
        <label>Endereço:</label>
        <input type="text" name="cli_endereco" value="{$ENDERECO}" class="form-control"  minlength="3" required>
        
        
    </div>    
    
    
    <div class="col-md-2 col-4">
        <label>Numero:</label>
        <input type="text" name="cli_numero" value="{$NUMERO}" class="form-control" required>
        
        
    </div>
    
    
    <div class="col-md-4 col-8">
        <label>Bairro:</label>
        <input type="text" name="cli_bairro" value="{$BAIRRO}" class="form-control" minlength="3" required>
        
        
    </div>
    
    
    <div class="col-md-4 col-8">
        <label>Cidade:</label>
        <input type="text" name="cli_cidade" value="{$CIDADE}" class="form-control" minlength="3" required>
        
        
    </div>
    
    
    <div class="col-md-2 col-4">
        <label>UF:</label>
       
        <input type="text" name="cli_uf" value="{$UF}" class="form-control" maxlength="2" minlength="2" required>
        
        
    </div>
    
    
    <div class="col-md-2">
        <label>Cep:</label>
       
        <input type="number" name="cli_cep" value="{$CEP}" class="form-control" minlength="8" maxlength="8" required>
        
        
    </div>
    
    
    <div class="col-md-4">
        <label>Email:</label>
       
        <input type="email" name="cli_email" value="{$EMAIL}" class="form-control" required>
        
        
    </div>
 
    
       
    
</section>

      <br>
      <br>
      
      <section class="row" id="btngravar" style="margin-left: 0px; margin-right: 0px;">
          
       <div class="col-md-4"></div>
       
       <div class="col-md-4">
           <button type="submit" class="btn btn-info btn-block "><i class="far fa-edit"></i> Gravar </button>
               
           
       </div>
       
       <div class="col-md-4"></div>
    
    
</section>
      
      
         </form>

         <br><br>
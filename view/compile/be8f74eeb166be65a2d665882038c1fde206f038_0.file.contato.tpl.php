<?php
/* Smarty version 3.1.39, created on 2021-05-06 07:53:07
  from 'C:\xampp\htdocs\lojaphp2\view\contato.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6093ca93e2f0e3_20929692',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be8f74eeb166be65a2d665882038c1fde206f038' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp2\\view\\contato.tpl',
      1 => 1620298386,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6093ca93e2f0e3_20929692 (Smarty_Internal_Template $_smarty_tpl) {
?><style>

@media screen and (min-width: 576px) {

  #linha{

    margin-right: -20%;

  }

}

</style>


<div class="container">
  <div class="row" id="linha">

    
      
      <form class="form-horizontal" id="frmcontatoazul" action="envio"> <!-- os dados do formulario sera enviado para envio.php do controller, no action ele não colocou o .php pois aqui vai cair no caminho do controler -->
      
      <fieldset>
      
      <!-- Form Name -->
      <legend>Contato</legend>
      
      <!-- Text input-->
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="txtinputnome">Nome</label>  
        <div class="col-md-8">
        <input id="txtinputnome" name="txtinputnome" placeholder="Escreva seu nome completo" class="form-control input-md" required="required" type="text" />
        <span class="help-block">help</span>  
        </div>
      </div>
      
      <!-- Text input-->
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="txtinputemail">Email</label>  
        <div class="col-md-8">
        <input id="txtinputemail" name="txtinputemail" placeholder="Coloque um email válido" class="form-control input-md" required="required" type="email" />
        <span class="help-block">help</span>  
        </div>
      </div>
      
      <!-- Text input-->
      
      
      <!-- Textarea -->
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="txtinputarea">Mensagem</label>
        <div class="col-md-8">                     
          <textarea class="form-control" id="txtinputarea" rows="6" name="txtinputarea" placeholder="Digite sua Pergunta!"></textarea>
        </div>
      </div>
      
      <!-- Button -->
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="btnenviar"></label>
        <div class="col-md-8">
          <button id="btnenviar" name="btnenviar" class="btn btn-primary btn-lg">Enviar</button>
        </div>
      </div>
      
      </fieldset>
      
      </form>
       

    <div class="col-md-3">
      <br>
      <h4>Endereço</h4>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3071.9683377585307!2d-48.24599288565743!3d-18.89441331181835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94a4458b8380a27d%3A0x3798d8b70118cddf!2sR.%20Acre%2C%203150%20-%20Cust%C3%B3dio%20Pereira%2C%20Uberl%C3%A2ndia%20-%20MG%2C%2038402-045!5e1!3m2!1spt-BR!2sbr!4v1620295645683!5m2!1spt-BR!2sbr" width="100%" height="83%" style="border:1px; box-shadow: 0px 0px 10px rgb(80, 82, 82);" allowfullscreen="" loading="lazy"></iframe>
    
    </div>
    
</div>
</div><?php }
}

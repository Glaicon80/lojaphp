<?php 

if(!isset($_POST['pro_id']) or $_POST['pro_id'] < 1){ // se não existi nada no post ou se ele vier negativo
	echo '<h4 class="alert alert-danger"> Erro na operação! </h4>';
	Rotas::Redirecionar(1, Rotas::pag_Carrinho());
	exit();
}

$id = (int)$_POST['pro_id']; // só vai aceitar numero inteiro

$carrinho = new Carrinho();

try { //fez dentro do trai para ter mais segurança, mas não foi o sistema que chamou o try
	$carrinho->CarrinhoADD($id);
} catch (Exception $e) {
	echo '<h4 class="alert alert-danger"> Erro na operação! </h4>';
}

if($_POST['acao'] == 'del'){

	echo '<script>';
	echo   '$(document).ready(function(){';
	echo   '$("#modalAlerta1").modal()';
	echo   '})';
	echo '</script>';

Rotas::Redirecionar(1, Rotas::pag_Carrinho()); 
}elseif($_POST['acao'] == 'limpar'){
Rotas::Redirecionar(0, Rotas::pag_Carrinho());
}elseif($_POST['acao'] == 'add'){
Rotas::Redirecionar(0, Rotas::pag_Carrinho());
}

 ?>

<script>	
     $(document).ready(function(){;
     $("#alertaMensagem1").html("<label>Produto Removido</label>");
     });
 </script>
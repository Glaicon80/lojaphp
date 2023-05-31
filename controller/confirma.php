<?php 

require_once '../lib/autoload.php';

session_start();


list($valorFrete, $tipoFrete, $cep) = explode("-", $_POST['email']);



	$valorFrete= (float) $valorFrete;


	//1 - Encomenda normal (PAC), 2 - SEDEX, 3 - Tipo de frete não especificado. Direto do site do pagseguro

	if($tipoFrete =="PAC"){
		$tipoFrete ="1";
	}elseif($tipoFrete =="SEDEX"){
		$tipoFrete ="2";
	}else{
		$tipoFrete ="3";
	}


	$carrinho = new Carrinho();
    $carrinho->GetCarrinho();


	// aqui criamos mais duas sessao
	$_SESSION['PED']['frete'] = Sistema::MoedaBR($valorFrete);
    $_SESSION['PED']['frete_tipo'] = $tipoFrete;
	$_SESSION['PED']['cep'] = $cep;
	$_SESSION['PED']['total_com_frete'] = Sistema::MoedaBR($valorFrete + $carrinho->GetTotal());



echo Sistema::MoedaBR($valorFrete);



?>
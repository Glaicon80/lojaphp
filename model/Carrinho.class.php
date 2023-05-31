<?php 

class Carrinho{
	private $total_valor =0, $total_peso =0, $itens = array(), $comprimento = 0, $largura = 0, $total_altura =0;

	function GetCarrinho($sessao=NULL){

		$i = 1; 

		foreach ($_SESSION['PRO'] as $lista) {
			$sub = ($lista['VALOR_US'] * $lista['QTD']);
            $peso = ($lista['PESO']* $lista['QTD']);
            $altura = ($lista['ALTURA']* $lista['QTD']);
			$this->total_valor += $sub;
            $this->total_peso += $peso; // o peso vai ser o somatorio dos pesos das mercadorias
            $this->total_altura += $altura; // a altura vai ser a soma das alturas das mercadorias (supondo que as mesmas vão ser empilhadas na embalagem)

         if($lista['COMPRIMENTO']>$this->comprimento){ // aqui vamos pegar o comprimento do maior produto como comprimento da encomenda a ser enviada pelos correios

            $this->comprimento = $lista['COMPRIMENTO'];

         }

         if($lista['LARGURA']>$this->largura){ // aqui vamos pegar a largura do maior produto como comprimento da encomenda a ser enviada pelos correios
             
            $this->largura = $lista['LARGURA'];

         }

			$this->itens[$i] = array(

				'pro_id' => $lista['ID'],
				'pro_nome'  => $lista['NOME'],
	            'pro_valor' => $lista['VALOR'], // 1.000,99
	            'pro_valor_us' => $lista['VALOR_US'],  //1000.99
	            'pro_peso'  => $lista['PESO'],
	            'pro_qtd'   => $lista['QTD'],
	            'pro_img'   => $lista['IMG'],
	            'pro_link'  => $lista['LINK'],
				'pro_img_para_email'  => $lista['IMAGEM'],
	            'pro_subTotal'=> Sistema::MoedaBR($sub),         
	            'pro_subTotal_us'=> $sub 

				);
			$i++;
		}

		if(count($this->itens) > 0){
			return $this->itens;
		}else{
			echo '<h4 class="alert alert-danger"> Não há produtos no carrinho </h4>';

		}

	}


	function GetTotal(){
		return $this->total_valor;
	}

	function GetPeso(){
		return $this->total_peso;
	}

    function GetComprimento(){
		return $this->comprimento;
	}

    function GetAltura(){
		return $this->total_altura;
	}

    function GetLargura(){
		return $this->largura;
	}


	function CarrinhoADD($id){
		

		switch ($_POST['acao']) {
			case 'add':

                $produtos = new Produtos();
                $produtos->GetProdutosID($id);
                foreach ($produtos->GetItens() as $pro) {
                    $ID = $pro['pro_id'];
                    $NOME  = $pro['pro_nome'];
                    $VALOR_US = $pro['pro_valor_us'];
                    $VALOR  = $pro['pro_valor'];
                    $PESO  = $pro['pro_peso'];
                    $QTD   = $_POST['quantidade'];
                    $IMG   = $pro['pro_img_p'];
                    $LINK  = Rotas::pag_ProdutosInfo().'/'.$ID.'/'.$pro['pro_slug'];
                    $ESTOQUE = $pro['pro_estoque'];
                    $LARGURA = $pro['pro_largura'];
                    $ALTURA = $pro['pro_altura'];
                    $COMPRIMENTO = $pro['pro_comprimento'];
					$IMAGEM = $pro['pro_img_atual'];
                }

					if(!isset($_SESSION['PRO'][$ID]['ID'])){
						$_SESSION['PRO'][$ID]['ID'] = $ID;
						$_SESSION['PRO'][$ID]['NOME']  = $NOME;
					    $_SESSION['PRO'][$ID]['VALOR'] = $VALOR;
					    $_SESSION['PRO'][$ID]['VALOR_US'] = $VALOR_US;
					    $_SESSION['PRO'][$ID]['PESO']  = $PESO;
					    $_SESSION['PRO'][$ID]['QTD']   = $QTD;
					    $_SESSION['PRO'][$ID]['IMG']   = $IMG;
					    $_SESSION['PRO'][$ID]['LINK']  = $LINK; 
                        $_SESSION['PRO'][$ID]['ESTOQUE']  = $ESTOQUE; 
                        $_SESSION['PRO'][$ID]['LARGURA']  = $LARGURA;
                        $_SESSION['PRO'][$ID]['ALTURA']  = $ALTURA;
                        $_SESSION['PRO'][$ID]['COMPRIMENTO']  = $COMPRIMENTO;
						$_SESSION['PRO'][$ID]['IMAGEM']  = $IMAGEM;
                        
					}else{
						 $_SESSION['PRO'][$ID]['QTD']   += $QTD;
					}

					//echo '<h4 class="alert alert-success"> Produto Inserido! </h4>';

				break;

			case 'del':
				$this->CarrinhoDEL($id);
				break;

			case 'limpar':
				$this->CarrinhoLimpar();
				
				break;
			
			
		}
	}


	private function CarrinhoDEL($id){
		unset($_SESSION['PRO'][$id]);

		if(empty($_SESSION['PRO'])){
         unset($_SESSION['PRO']);
		}
	}

	private function CarrinhoLimpar(){
		unset($_SESSION['PRO']);
	}


}

 ?>

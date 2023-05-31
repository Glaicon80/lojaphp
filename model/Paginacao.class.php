<?php 

class Paginacao extends Conexao{ //extende conexao pois ela vai trabalhar com consultas no banco

	public $limite, $inicio, $totalpags, $link = array();

    //vamos criar uma função generica que vai paginar qualquer item (campo) de qualquer tabela
	function GetPaginacao($campo, $tabela){
		$query = "SELECT {$campo} FROM {$tabela}";

		$this->ExecuteSQL($query); //$this representa um objeto da classe de conexao    
		$total = $this->TotalDados(); // aqui vamos pegar o numero de registros (contagem de linhas) que foi encontrado na execução
        
		$this->limite = Config::BD_LIMIT_POR_PAG; //aqui vamos definir o numero de registros por pagina
		$paginas = ceil($total / $this->limite); // aqui vamos definir o numero de paginas, ceil vai arrendondar para cima em um valor inteiro
		$this->totalpags = $paginas;

		$p = (int)isset($_GET['p']) ? $_GET['p'] : 1; // vamos passar o numero da pagina (pagina 1,ou pagina 2,ou pagina 3... que estarão na forma de botoes de paginação) via url e vamos pegar esse numero de paginas via get
                                                      // isset -> se tiver parametro (o numero da pagina) entao vamos pegar o numero da pagina. Se nao tiver parametros vai passar um
		
        
           if($p > $paginas){  // aqui é um controle pois um p não pode ser maior que paginas, se isso acontecer p vai receber o valor da ultima pagina
			$p = $paginas;     //logico que para isso acontecer se o usuario digitar um numero de pagina na url pois nos botoes de paginação nao tem como isso acontecer
		}

		//TESTAR NA PRÁTICA
		$this->inicio = ($p * $this->limite) - $this->limite; // ex: vc clica no botao 2 da paginação, isso vai gerar um link que vai ser pego no get acima
                                                              //considerando limite = 3 vamos ter pela forma resultado igual a 3.
		                                                     // como o limit da query sql do select de produtos começa do zero (0,1,2,3) o produto que vai iniciar a listagem (inicio)vai ser o quarto, pois o banco de dados começa no id =1
		                                                     // desta forma a pagina 2 vai listar os produtos 4,5 e 6 apenas pois o limite de registros é 3.
                                                             // como o limit da query sql do select de produtos começa do zero (0,1,2,3) o produto que vai iniciar a listagem (inicio)vai ser o quarto, pois o banco de dados começa no id =1
        
        
        $tolerancia = 4;                                  // essa variavel (tolerancia) indica que se vc clicar em um botao da paginação vai mostrar do lado direito x botoes tolerancia  e do lado esquerdo tbm vai mostrar x botoes de tolerancia
        $mostrar = $p + $tolerancia;                      // isso vai fazer que a paginação trabalhe em intervalos de tolerancia para direita e para esquerda. Isso é importante pois se vc tiver muitos produtos iria rezultar em muitos botoes de paginações, e com os intervalos fica esteticamente melhor e mais organizado
        if($mostrar > $paginas){                          // esse if vai ser importante para o for  abaixo, pois quando chegar nos ultimos botoes de paginação, os maiores, o final vai ser a paginação e nao mais a tolerancia + p
			$mostrar = $paginas;
		}


		for($i = ($p - $tolerancia); $i <= $mostrar; $i++): //usando o : nao precisa usar a chave no for, da na mesma
			if($i < 1){
				$i = 1;
			}
			array_push($this->link, $i); // array_push vai adicionar o numero da pagina na ultima posicao do array
            
		endfor;

	}
}

 ?>
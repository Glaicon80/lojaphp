<?php 

Class Conexao extends Config{
	private $host, $user, $senha, $banco;

	protected $obj, $itens=array(), $prefix;

	public $paginacao_links, $totalpags, $limite, $inicio;

	function __construct(){
		$this->host = self::BD_HOST;
		$this->user = self::BD_USER;
		$this->senha = self::BD_SENHA;
		$this->banco = self::BD_BANCO;
		$this->prefix = self::BD_PREFIX;

        //vamos chamar a conexao dentro do construtor e tbm vamos fazer a conexao com o banco dentro de um try/catch pois é um processo que pode dar erro, e desta forma vamos ter um retorno do erro se houver
		try {
			if($this->Conectar() == null){ //caso a conexao seja nula ele vai conectar (isso é bom pois se vc chamar uma conexao que ja existe pode dar problema)
				$this->Conectar();
			}
			

		} catch (Exception $e) {
			exit($e->getMessage().'<h2> Erro ao conectar com o banco de dados! </h2>'); // o exit vai parar o codigo da conexao
		}

	}

	private function Conectar(){
		$options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //aqui é uma configuração caso o banco do servidor não estiver configurado para utf8, ele vai configurar
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING // vai retornar os erros
			); 
		$link = new PDO("mysql:host={$this->host};dbname={$this->banco}" , // a conexao com o banco vai ser do tipo PDO que exige tres parametros obrigatorios   (host/banco, nome, senha)
			$this->user, $this->senha, $options);                            // o options não é obrigatorio, mais vai servir para fazer configurações no banco
		return $link;
	}
	

    //essa função foi criada pois esse procedimento é comum para todos os metodos, desta forma não ficaremos repetindo codigo
	function ExecuteSQL($query, array $params = NULL){  // aqui vamos receber todas as query(consulta, update, inserir,deletar), os parametros viram na forma de array, e tem casos q não passarão parametros ai definimos o nulo para essas situações
		$this->obj = $this->Conectar()->prepare($query); // aqui vamos preparar (prepare --função do php) a query

		if(is_array($params) >0){ //se tiver um ou mais parametros vai entrar nesse if
			foreach($params as $key =>$value){
				$this->obj->bindvalue($key, $value); //bindvalue(:id, $id) que vieram de GetProdutosID onde $id tem que ser obrigatoriamente um inteiro, caso contrario nem vai ser executado a query
			}                                        // e para isso que serve esse codigo, para proteger a query onde ela só sera executada se for um inteiro no id, desta forma já impede bastante a injeção sql
		}
		
		return $this->obj->execute(); // aqui vamos executar a query e retorna (o seu retorno é true se foi feita a consulta e false se não deu certo a execução)
	}

    // a função acima apenas executa mais não retorna resultado, essa função vai ser a responsavel em pegar e listar os dados
	function ListarDados(){ //essa função sera bastante util para um select onde vc quer buscar os resultados.
		return $this->obj->fetch(PDO::FETCH_ASSOC); //FETCH_ASSOC vai colocar os resultados em um array.
	}

    //total de dados vai retornar o numeros de registro encontrados em uma consulta no banco de dados
    // esse metodo vai ser util qdo precisarmos saber se existi registro em uma tabela ou não
	function TotalDados(){
		return $this->obj->rowCount();
	}


	function GetItens(){
		return $this->itens;
	}



	//vamos criar uma função generica que vai receber qualquer item (campo) de qualquer tabela
	function PaginacaoLinks($campo, $tabela){
		$pag = new Paginacao();
		$pag->GetPaginacao($campo, $tabela);
		$this->paginacao_links = $pag->link;

		$this->totalpags = $pag->totalpags;
		$this->limite = $pag->limite;
		$this->inicio = $pag->inicio;

		if($this->totalpags > 0){
			return " limit {$this->inicio}, {$this->limite}"; // em toda query sql existe o comando chamado limit, e vamos retornar esse comando aqui via string. Não esquecer de soltar o espaço
		}else{                                    // no limit vamos passar o numero de itens exatos (inicio) e o limite de registros por pagina
			return " ";
		}
		
	}



	// essa função vai receber o numero total de paginas vindos do array do metodo GetPaginacao da classe  Paginacao 
	//e vai criar os botoes de paginação definidos pela classe bootstrap pagination
	protected function Paginacao($paginas=array()){
		$pag = '<ul class="pagination">';
		$pag .= '<li class="page-item"><a class="page-link" href="?p=1"> << Inicio</a></li>'; //a interrogação indica que o que vier depois dela é um parametro e aqui sempre vai mostrar a primeira pagina

		foreach($paginas as $p):
			$pag .= '<li class="page-item"><a class="page-link" href="?p='.$p.'">'.$p.'</a></li>'; // a url vai ficar localhost/lojaphp/produtos?p=2
			endforeach;

		$pag .= '<li class="page-item"><a class="page-link" href="?p='. $this->totalpags .'"> ... '.$this->totalpags.' >></a></li>'; //aqui vai sempre me mostrar a ultima pagina

		$pag .= '</ul>';

		if($this->totalpags > 1){ // só vai mostrar a paginação se o total de paginas for maior que um, pois se não for é pq nao tem a necessidade de aparecer a paginação pois todos os produtos cabem numa unica pagina
		return $pag;
		}
	}

	function ShowPaginacao(){
		return $this->Paginacao($this->paginacao_links);

	}
	



}

 ?>
<?php 

Class Categorias extends Conexao{

	private $cate_id, $cate_nome, $cate_slug;


	function __construct(){ //aqui vamos chamar o construtor da classe Categoria
		parent::__construct(); // aqui vamos chamar o construtor da classe mãe que é a classe Conexao
	}                          // ao chamarmos o construtor da classe mãe esse construtor ja vai pegar as constantes de conexao e tbm vai fazer a conexao como o banco de dados

	function GetCategorias(){
		//query para buscar os produtos de uma categoria especifica.
		$query = "SELECT * FROM {$this->prefix}categorias";

		$this->ExecuteSQL($query);

		$this->GetLista();
		
	}



	private function GetLista(){
		$i = 1;
		while($lista = $this->ListarDados()):
		$this->itens[$i] = array(
			 'cate_id' => $lista['cate_id'],
			 'cate_nome'  => $lista['cate_nome'] ,  
	         'cate_slug'  => $lista['cate_slug'] ,  
	         'cate_link'  => Rotas::pag_Produtos(). '/' .$lista['cate_id'] . '/' . $lista['cate_slug']  , //http://localhost/lojaphp/produtos/2/categoria-camisa
			 'cate_link_adm'  => Rotas::pag_ProdutosADM(). '/' .$lista['cate_id'] . '/' . $lista['cate_slug']  //  http://localhost/lojaphp/adm/adm_produtos/2/categoria-camisa
			);



		$i++;
		endwhile;
	}



	function Inserir($cate_nome){
        
        // trato os campos
        $this->setCate_nome($cate_nome); // vai avaliar se é uma string
        $this->setCate_slug($cate_nome); //vai entrar no metodo para transformar em um slug


        
        // monto a SQL
        $query = " INSERT INTO {$this->prefix}categorias (cate_nome, cate_slug )";
        $query.= " VALUES (:cate_nome, :cate_slug )";
        // passo so parametros
        $params = array(':cate_nome' => $this->getCate_nome(),
                        ':cate_slug' => $this->getCate_slug(),
                      
            );
        // executo a minha SQL
            if($this->ExecuteSQL($query, $params)):
                return TRUE;
                
            else:
                return FALSE;
                
            endif;
        
        
    }




    function Editar($cate_id,$cate_nome){
        
        // trato os campos
        $this->setCate_nome($cate_nome);
        $this->setCate_slug($cate_nome);
        
        // monto a SQL
        $query = " UPDATE {$this->prefix}categorias ";
        $query.= " SET cate_nome = :cate_nome, cate_slug = :cate_slug ";
        $query.= " WHERE cate_id = :cate_id ";
        // passo so parametros
        $params = array(':cate_nome' => $this->getCate_nome(),
                        ':cate_slug' => $this->getCate_slug(),
                        ':cate_id'   => (int)$cate_id,
            );
        // executo a minha SQL
            if($this->ExecuteSQL($query, $params)):
                return TRUE;
                
            else:
                return FALSE;
                
            endif;
        
        
    }



     function Apagar($cate_id){
        
          // verifico se  tenho itens antes de apagar a categoria
          $pro = new Produtos();
          $pro->GetProdutosCateID($cate_id);
          
        if( $pro->TotalDados() > 0):

            return FALSE;
             // echo '<div class="alert alert-danger" > Esta categoria tem: ';
             // echo $pro->TotalDados();
            //  echo ' produtos. Não pode ser apagada, para apagar precisa primeiro apagar os produtos dela </div>';
     
              // se nao tiver produtos nela  eu apago 
         else:
            
                 // monto a SQL
        $query = " DELETE FROM {$this->prefix}categorias";
        $query.= " WHERE cate_id = :id";
        
        // passo os parametros
        $params = array(':id' => (int)$cate_id);
        // executo a SQL
    
         if($this->ExecuteSQL($query, $params)):
                return TRUE;
                
            else:
                return FALSE;
                
            endif;
        
        endif;
     
        
    }



	 //MÉTODOS GET
     function getCate_nome() {
        return $this->cate_nome;
    }

    function getCate_slug() {
        return $this->cate_slug;
    }



    //MÉTODOS SET
    function setCate_nome($cate_nome) {
       
        $this->cate_nome = filter_var($cate_nome, FILTER_SANITIZE_STRING); // vai filtrar para  ser string
    }

    function setCate_slug($cate_slug) {
       
        
        $this->cate_slug = Sistema::GetSlug($cate_slug); // vai aplicar o metodo que deixar na forma desejado (deixar tudo minusculos, sem acento, ifen no lugar dos espaços vazios)
    }
    


}

 ?>
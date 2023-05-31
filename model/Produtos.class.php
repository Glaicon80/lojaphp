<?php 


Class Produtos extends Conexao{



	private $pro_nome, $pro_categoria, $pro_ativo, $pro_modelo, $pro_ref, 
	$pro_valor, $pro_promocao, $pro_estoque, $pro_stq_min, $pro_peso , $pro_altura, $pro_largura, $pro_comprimento ,
	$pro_img, $pro_desc, $pro_slug ;




	function __construct(){
		parent::__construct();
	}
	


	function GetProdutos(){
		//query para buscar os produtos de uma categoria especifica pelo id da categoria.
        //INNER JOIN  vai ser a intersecção da tabela produtos com categoria, gerando uma nova tabela atraves de um filtro em comum entre elas
		$query = "SELECT * FROM {$this->prefix}produtos p INNER JOIN {$this->prefix}categorias c ON p.pro_categoria = c.cate_id";

		//$query .= " LIMIT 9,3"; // o primeiro parametro vai ser a posição onde os registros começarão a aparecer, lembrando que a primeira posição é o zero (ex: se for 9 vai aparecer do 10 registro para frente, pois de 0 ate 9 vai ser a posição 10)
                                 // o segundo parametro vai o numero de registro que aparecerão na pagina
								 // aqui foi apenas um extemplo pq o limit vai vim dar função PaginacaoLinks da classe Conexao

	    $query .= " ORDER BY pro_id DESC"; //aqui ele concatenou as duas query atras do .= é como se se fosse uma só (lembrando que tem que soltar um espaço depois das aspas)

		$query .= $this->PaginacaoLinks("pro_id",$this->prefix."produtos");
		
		$this->ExecuteSQL($query); // toda vez que der um $this é como se fosse um objeto da classe conexao

		$this->GetLista();
		
	}



	function GetProdutosID($id){
		//query para buscar um produto pelo seu id especifico.
		$query = "SELECT * FROM {$this->prefix}produtos p INNER JOIN {$this->prefix}categorias c ON p.pro_categoria = c.cate_id";

		$query .= " AND pro_id = :id"; // vai buscar o item de produto  cujo id seja igual ao id que o metodo recebeu

		$params = array(':id'=>(int)$id); // este comando esta relacionado com sql-injec que vai impedir de alguem digitar a url um id que nao seja inteiro
                                          // :id e $id são a chave e o valor do parametro enviado para a função ExecuteSQL
		$this->ExecuteSQL($query, $params);

		$this->GetLista();
		
	}

	function GetProdutosCateID($id){
		//query para buscar os produtos de uma categoria especifica.

		$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT); // esse comando é para segurança contra sql injection

		$query = "SELECT * FROM {$this->prefix}produtos p INNER JOIN {$this->prefix}categorias c ON p.pro_categoria = c.cate_id";

		$query .= " AND pro_categoria = :id";

		$query .= $this->PaginacaoLinks("pro_id", $this->prefix."produtos WHERE pro_categoria=".(int)$id);



		$params = array(':id'=>(int)$id);

		$this->ExecuteSQL($query, $params);
		
		$this->GetLista();
		
	}



	private function GetLista(){
		$i = 1;
		while($lista = $this->ListarDados()): //aqui poderia ter colocado um foreach , mas o while tbm serve.
		$this->itens[$i] = array( // cada posicao do array itens vai guardar um array com as varias posições definidas abaixo
			 'pro_id' => $lista['pro_id'], //aqui vamos recuperar cada campo do banco de dados e guardar numa posição do array
			 'pro_nome'  => $lista['pro_nome'] ,  
	         'pro_desc'  => $lista['pro_desc'] ,  
	         'pro_peso'  => $lista['pro_peso'] ,  
	         'pro_valor'   => Sistema::MoedaBR($lista['pro_valor']),  //MoedaBR vai formatar o valor adicionando ponto no millhar e virgula para os centavos
	         'pro_valor_us'   => $lista['pro_valor'],
             'pro_promocao'   => Sistema::MoedaBR($lista['pro_promocao']), 
	         'pro_promocao_us'   => $lista['pro_promocao'],
			 'pro_altura' => $lista['pro_altura'] ,  
	         'pro_largura' => $lista['pro_largura'] ,  
	         'pro_comprimento' => $lista['pro_comprimento'] ,  
			 'pro_img'     => Rotas::ImageLink($lista['pro_img'], 180, 180) ,  
	         'pro_img_g'     => Rotas::ImageLink($lista['pro_img'], 600, 600) , 
	         'pro_img_p'     => Rotas::ImageLink($lista['pro_img'], 70, 70) , 
	         'pro_slug' => $lista['pro_slug'], 
	         'pro_ref' => $lista['pro_ref'], 
	         'cate_nome' => $lista['cate_nome'] , 
	         'cate_id'   => $lista['cate_id'],
             'pro_modelo'   => $lista['pro_modelo'] ,  
             'pro_estoque'   => $lista['pro_estoque'] , 
             'pro_stq_min'   => $lista['pro_stq_min'] ,
             'pro_ativo'   => $lista['pro_ativo'] , 
             'pro_img_arquivo'   => Rotas::get_SiteRAIZ() .'/'. Rotas::get_ImagePasta().$lista['pro_img'], //  C:/xampp/htdocs/lojaphp/media/images/nome da imagem
             'pro_img_atual'     => $lista['pro_img'] , // é o nome da imagem atual que esta no banco
			);

		$i++;
		endwhile;
	}



// daqui para baixo vao ser funcões para o administrador

    function Preparar($pro_nome, $pro_categoria, $pro_ativo, $pro_modelo, $pro_ref, 
            $pro_valor,$pro_promocao=null, $pro_estoque, $pro_stq_min, $pro_peso , $pro_altura, $pro_largura, $pro_comprimento ,
            $pro_img, $pro_desc, $pro_slug=null){
        
                $this->setPro_nome($pro_nome);
                $this->setPro_categoria($pro_categoria);
                $this->setPro_ativo($pro_ativo);
                $this->setPro_modelo($pro_modelo);
                $this->setPro_ref($pro_ref);
                $this->setPro_valor($pro_valor);
                $this->setPro_promocao($pro_promocao);
                $this->setPro_estoque($pro_estoque);
                $this->setPro_stq_min($pro_stq_min);
                $this->setPro_peso($pro_peso);
                $this->setPro_altura($pro_altura);
                $this->setPro_largura($pro_largura);
                $this->setPro_comprimento($pro_comprimento);
                $this->setPro_img($pro_img);
                $this->setPro_desc($pro_desc);
                $this->setPro_slug($pro_nome);
            }

    



	function Inserir(){
          
        $query = "INSERT INTO {$this->prefix}produtos (pro_nome, pro_categoria, pro_ativo, pro_modelo, pro_ref,";
        $query.= " pro_valor, pro_promocao, pro_estoque, pro_stq_min, pro_peso, pro_altura, pro_largura, pro_comprimento ,pro_img, pro_desc, pro_slug)";
        $query.= " VALUES";
        $query.= " (:pro_nome, :pro_categoria, :pro_ativo, :pro_modelo, :pro_ref, :pro_valor, :pro_promocao, :pro_estoque, :pro_stq_min, :pro_peso,";
        $query.= " :pro_altura, :pro_largura, :pro_comprimento ,:pro_img, :pro_desc, :pro_slug)";
        
        $params = array(
        ':pro_nome'=> $this->getPro_nome(),   
        ':pro_categoria'=> $this->getPro_categoria(),   
        ':pro_ativo'=> $this->getPro_ativo(),   
        ':pro_modelo'=> $this->getPro_modelo(),   
        ':pro_ref'=> $this->getPro_ref(),   
        ':pro_valor'=> $this->getPro_valor(), 
        ':pro_promocao'=> $this->getPro_promocao(),   
        ':pro_estoque'=> $this->getPro_estoque(),  
        ':pro_stq_min'=> $this->getPro_stq_min(), 
        ':pro_peso'=> $this->getPro_peso(),   
        ':pro_altura'=> $this->getPro_altura() , 
        ':pro_largura'=> $this->getPro_largura(),
        ':pro_comprimento'=> $this->getPro_comprimento(),   
        ':pro_img'=> $this->getPro_img(),   
        ':pro_desc'=> $this->getPro_desc(),   
        ':pro_slug'=> $this->getPro_slug(),   
        );


          if($this->ExecuteSQL($query, $params)):
               
                   return TRUE;
               
               else:
                   
                   return FALSE; 
               
           endif;
        
        
           
           
        }


        function Alterar($id){
          
            $query = " UPDATE {$this->prefix}produtos SET pro_nome=:pro_nome, pro_categoria=:pro_categoria,";
            $query.= " pro_ativo=:pro_ativo, pro_modelo=:pro_modelo, pro_ref=:pro_ref,";
            $query.= " pro_valor=:pro_valor, pro_promocao=:pro_promocao, pro_estoque=:pro_estoque, pro_stq_min=:pro_stq_min , pro_peso=:pro_peso , ";
            $query.= " pro_altura=:pro_altura, pro_largura=:pro_largura,";
            $query.= " pro_comprimento=:pro_comprimento ,pro_img=:pro_img, pro_desc=:pro_desc, pro_slug=:pro_slug";
            $query.= " WHERE pro_id = :pro_id";
           
            
            $params = array(
            ':pro_nome'=> $this->getPro_nome(),   
            ':pro_categoria'=> $this->getPro_categoria(),   
            ':pro_ativo'=> $this->getPro_ativo(),   
            ':pro_modelo'=> $this->getPro_modelo(),   
            ':pro_ref'=> $this->getPro_ref(),   
            ':pro_valor'=> $this->getPro_valor(), 
            ':pro_promocao'=> $this->getPro_promocao(),  
            ':pro_estoque'=> $this->getPro_estoque(),   
            ':pro_stq_min'=> $this->getPro_stq_min(),
            ':pro_peso'=> $this->getPro_peso(),   
            ':pro_altura'=> $this->getPro_altura() , 
            ':pro_largura'=> $this->getPro_largura(),
            ':pro_comprimento'=> $this->getPro_comprimento(),   
            ':pro_img'=> $this->getPro_img(),   
            ':pro_desc'=> $this->getPro_desc(),   
            ':pro_slug'=> $this->getPro_slug(),   
            ':pro_id'=> (int)$id,   
                         
            );
            
               
            
               // executo a SQL
               if($this->ExecuteSQL($query, $params)):
                   
                       return TRUE;
                   
                   else:
                       
                       return FALSE; 
                   
               endif;
            
            
               
               
            }



            // dar baixa no estoque apos conclusão da compra
            function BaixaEstoque($id,$estoque){
          
                $query = " UPDATE {$this->prefix}produtos SET pro_estoque=:pro_estoque";
                $query.= " WHERE pro_id = :pro_id";      

                $params = array(
                
                ':pro_estoque'=> $estoque,      
                ':pro_id'=> (int)$id,   
                             
                );
                
              
                   // executo a SQL
                   if($this->ExecuteSQL($query, $params)):
                       
                           return TRUE;
                       
                       else:
                           
                           return FALSE; 
                       
                   endif; 
                   
                }
    
    
    
        function Apagar($id){
            $query = "DELETE FROM {$this->prefix}produtos WHERE pro_id = :id";
            $params = array(
                ':id' => (int)$id
                );
    
             if($this->ExecuteSQL($query, $params)):
                   
                       return TRUE;
                   
                   else:
                       
                       return FALSE; 
                   
               endif;
        }



        function GetProdutosNome($nome){
        
            // monto a SQL
          $query = "SELECT * FROM {$this->prefix}produtos p INNER JOIN {$this->prefix}categorias c ON p.pro_categoria = c.cate_id";       
          $query .= " WHERE pro_nome LIKE '%$nome%'";
          $query .= $this->PaginacaoLinks("pro_id", $this->prefix."produtos WHERE pro_nome LIKE '%$nome%'");
  
            // o like substitui o = na clausula where qdo queremos fazer uma pesquisa aproximada e %$nome% significa que vai buscar tudo que tenha o conteudo nome, levando em consideração o que vier antes e o que vier depois do nome
          
          // passando parametros
          $params = array(':nome'=>$nome);
         // executando a SQL                      
          $this->ExecuteSQL($query,$params);
          // trazendo a listagem 
          $this->GetLista();
      }
    





		//MÉTODOS GET

	function getPro_nome() {
        return $this->pro_nome;
    }

    function getPro_categoria() {
        return $this->pro_categoria;
    }

    function getPro_ativo() {
        return $this->pro_ativo;
    }

    function getPro_modelo() {
        return $this->pro_modelo;
    }

    function getPro_ref() {
        return $this->pro_ref;
    }

    function getPro_valor() {
        return $this->pro_valor;
    }

    function getPro_promocao() {
       
        return $this->pro_promocao;
       
    }

    function getPro_estoque() {
        return $this->pro_estoque;
    }

    function getPro_stq_min() {
        return $this->pro_stq_min;
    }

    function getPro_peso() {
        return $this->pro_peso;
    }

    function getPro_altura() {
        return $this->pro_altura;
    }

    function getPro_largura() {
        return $this->pro_largura;
    }

    function getPro_comprimento() {
    
        return $this->pro_comprimento;
    }

    function getPro_img() {
        return $this->pro_img;
    }

    function getPro_desc() {
        return $this->pro_desc;
    }

    function getPro_slug() {
        return $this->pro_slug;
    }





    //MÉTODOS SET

    function setPro_nome($pro_nome) {
        $this->pro_nome = $pro_nome;
    }

    function setPro_categoria($pro_categoria) {
        $this->pro_categoria = $pro_categoria;
    }

    function setPro_ativo($pro_ativo) {
        $this->pro_ativo = $pro_ativo;
    }

    function setPro_modelo($pro_modelo) {
        $this->pro_modelo = $pro_modelo;
    }

    function setPro_ref($pro_ref) {
        $this->pro_ref = $pro_ref;
    }

    function setPro_valor($pro_valor) { // o msql trabalha com ponto e não com virgula (com virgula da erro)
        //1.335,99 => 1335.99
        
        // procura a virgula e troca por ponto
      $pro_valor = str_replace('.', '', $pro_valor); // primeiro vai avaliar se tem ponto e vai retirar
      $pro_valor = str_replace(',', '.', $pro_valor); // depois vai substituir a virgula por ponto.
       
        $this->pro_valor = $pro_valor ;
       // echo $this->pro_valor;
        
    }


    function setPro_promocao($pro_promocao=null) { // o msql trabalha com ponto e não com virgula (com virgula da erro)
        //1.335,99 => 1335.99
     if($pro_promocao != null) {  
        // procura a virgula e troca por ponto
      $pro_promocao = str_replace('.', '', $pro_promocao); // primeiro vai avaliar se tem ponto e vai retirar
      $pro_promocao = str_replace(',', '.', $pro_promocao); // depois vai substituir a virgula por ponto.         
     }
     $this->pro_promocao = $pro_promocao ;
    }
    
    function setPro_estoque($pro_estoque) {
        $this->pro_estoque = $pro_estoque;
    }

    function setPro_stq_min($pro_stq_min) {
        $this->pro_stq_min = $pro_stq_min;
    }

    function setPro_peso($pro_peso) { //no msql trabalha com ponto e não com virgula
      
       ///  1,600  => 1.600
        $this->pro_peso = str_replace(',', '.', $pro_peso); // vai substituir a virgula pelo ponto
   
    }

    function setPro_altura($pro_altura) {
       
        $this->pro_altura = $pro_altura;
    }

    function setPro_largura($pro_largura) {
        $this->pro_largura = $pro_largura;
    }

    function setPro_comprimento($pro_comprimento) {
        $this->pro_comprimento = $pro_comprimento;
    }

    function setPro_img($pro_img) {
        $this->pro_img = $pro_img;
    }

    function setPro_desc($pro_desc) {
        $this->pro_desc = $pro_desc;
    }

    function setPro_slug($pro_slug) {
       
        //EX Camisa Social grande  depois que passar pela GetSlug vai ficar camisa-social-grande
        // vai deixar tudo em minusculo, os espaços vazios vao ser substituidos por ifens, acentos serao removidos
       // isso tudo para facilitar nos buscadores qdo alguem for fazer pesquisa no google, importante para SEO 
        
        $this->pro_slug = Sistema::GetSlug($pro_slug);
    }


}

?>
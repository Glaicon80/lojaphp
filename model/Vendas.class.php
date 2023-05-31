<?php 

class Vendas extends Conexao{

	private $total_valor;

	function __construct(){
		parent::__construct();
	}


    function inserir($pro_id,$item_valor,$item_qtd,$ped_data){

		
		 $query  = "INSERT INTO ".$this->prefix."vendas ";   
     	 $query .= "(item_produto, item_valor, item_quantidade, item_date)"; 
    	 $query .= " VALUES ";
     	 $query .= "(:pro_id, :item_valor, :item_qtd, :ped_data)";

     	 $params = array(
     	 	':pro_id' => $pro_id,
            ':item_valor' => $item_valor,
            ':item_qtd'=> $item_qtd,
            ':ped_data' => $ped_data
     	 	);


     	 $this->ExecuteSQL($query, $params);
     	 

	}



    function GetItensVendas($dataIni=null,$dataFim=null){


        $datainicial = $dataIni;
        $datafinail = $dataFim;

		$query = " SELECT * FROM {$this->prefix}vendas";


        $this->ExecuteSQL($query);
    
        $itensProdutos=array();


        $i = 1;
        while ($lista = $this->ListarDados()):
                
        $itensProdutos[$i] = array('item_produto' => $lista['item_produto'] );
    
        $i++;
            
        endwhile;

        $result = array_unique($itensProdutos,SORT_REGULAR); // array_unique vai eliminar os registros repetidos, para que o id do produto não se repita

        $this->GetItensVendas2($result,$datainicial,$datafinail);

	}



    function GetItensVendas2($result,$dataIni=null,$dataFim=null){

       


        if($dataFim != null and $dataIni != null){


        $i = 1;
        foreach ($result as $value){    
    
        $query = " SELECT * FROM {$this->prefix}vendas v, {$this->prefix}produtos p, {$this->prefix}categorias c";
        $query .= " WHERE p.pro_id = v.item_produto AND c.cate_id = p.pro_categoria";
        $query.= " AND v.item_date between :data_ini AND :data_fim ";
        $query .= " AND v.item_produto = :IdProduto";
          
       // passando os parametros  
        $params = array(':data_ini'=>$dataIni, 
                        ':data_fim'=>$dataFim,
                        ':IdProduto' =>(int)$value['item_produto']
                    
                    );
        $this->ExecuteSQL($query, $params);

        if($this->TotalDados()>0){
        $this-> GetLista($i);
        }
        $i++;
        }

        }else{

        $i = 1;
        foreach ($result as $value){    

	    $query = " SELECT * FROM {$this->prefix}vendas v, {$this->prefix}produtos p, {$this->prefix}categorias c";
		$query .= " WHERE p.pro_id = v.item_produto AND c.cate_id = p.pro_categoria";
		$query .= " AND v.item_produto = :IdProduto";
		$params[':IdProduto'] = (int)$value['item_produto'];
        $this->ExecuteSQL($query, $params);

        if($this->TotalDados()>0){
            $this-> GetLista($i);
            }
       
            $i++;
        }  

         }
		

	}


   

	private function GetLista($i){


        $total =0;
       
        while ($lista = $this->ListarDados()):

    	$total += $lista['item_quantidade'];
        $nome = $lista['pro_nome'];
        $prodId = $lista['pro_id'];
        $imagem = Rotas::ImageLink($lista['pro_img'], 60, 60);
        $categoria = $lista['cate_nome'];
        $estoque = $lista['pro_estoque'];
        $stoMin = $lista['pro_stq_min'];

        endwhile;
            
        $this->itens[$i] = array(
                'item_quantidade' =>  $total,
                'item_nome'  => $nome,
                'item_img'  => $imagem,
                'item_nome_categoria'  => $categoria,
                'pro_stq'  => $estoque,
                'pro_stq_min'  =>  $stoMin,
                'pro_id'  =>  $prodId,
                
            );
        
    }


    function ordemDescresente(){

       $ordenar = $this->GetItens();
       rsort($ordenar);

       return $ordenar;

    }


    function ordemCrescente(){

        $ordenar = $this->GetItens();
        sort($ordenar);
 
        return $ordenar;
 
     }




     function Apagar($id){
        $query = "DELETE FROM {$this->prefix}vendas WHERE item_produto = :id";
        $params = array(
            ':id' => (int)$id
            );

         if($this->ExecuteSQL($query, $params)):
               
                   return TRUE;
               
               else:
                   
                   return FALSE; 
               
           endif;
    }



}

 ?>
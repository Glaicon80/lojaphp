<?php 

class Pedidos extends Conexao{
	function __construct(){
		parent::__construct();
	}

	function PedidoGravar($cliente, $cod, $ref, $freteValor=null, $freteTipo=null,$pedidoStatus,$pedidoCodigoPagSeguro,$tipo,$link,$clienteEntrega,$enderecoEntrega){

		$retorno = FALSE;
		 $query  = "INSERT INTO ".$this->prefix."pedidos ";   
     	 $query .= "(ped_data, ped_hora, ped_cliente, ped_cod, ped_ref, ped_frete_valor, ped_frete_tipo,ped_pag_status,ped_pag_codigo,ped_pag_tipo,ped_pag_link,ped_cliente_entrega,ped_entrega)"; 
    	 $query .= " VALUES ";
     	 $query .= "(:data, :hora, :cliente, :cod, :ref, :frete_valor, :frete_tipo, :pedidoStatus, :pedidoCodigoPagSeguro, :tipo, :link, :ped_cliente_entrega, :ped_entrega)";

     	 $params = array(


     	 	    ':data' => Sistema::DataAtualUS(),
            ':hora' => Sistema::HoraAtual(),
            ':cliente'=> (int)$cliente,
            ':cod' => $cod,
            ':ref' => $ref,
            ':frete_valor'=>$freteValor,
            ':frete_tipo' =>$freteTipo,
            ':pedidoStatus' =>$pedidoStatus,
            ':pedidoCodigoPagSeguro'=>$pedidoCodigoPagSeguro,
            ':tipo'=>$tipo,
            ':link'=>$link,
            ':ped_cliente_entrega'=>$clienteEntrega,
            ':ped_entrega'=>$enderecoEntrega

     	 	);


     	 $this->ExecuteSQL($query, $params);
     	 
     	 //gravar os itens do pedido
     	 $this->ItensGravar($cod);
     	 $retorno = TRUE;
     	 return $retorno;

	}

    function GetPedidosCliente($cliente=null){
      
      $query = "SELECT * FROM {$this->prefix}pedidos p INNER JOIN {$this->prefix}clientes c";
      $query .= " ON p.ped_cliente = c.cli_id";

      if($cliente != null){

        $cli = (int)$cliente;
        $query .= " AND ped_cliente = {$cli}";
        $query .= " ORDER BY ped_data DESC, ped_hora DESC ";
        $query .= $this->PaginacaoLinks("ped_id", $this->prefix."pedidos WHERE ped_cliente=".(int)$cli);

      } else{

        $query .= " ORDER BY ped_data DESC, ped_hora DESC ";
        $query .= $this->PaginacaoLinks("ped_id",$this->prefix."pedidos");

      }

      $this->ExecuteSQL($query);
      $this->GetLista();   
    }


     private function GetLista(){ 
        
        $i = 1;
        while ($lista = $this->ListarDados()):
            
        $this->itens[$i] = array(
                'ped_id'    => $lista['ped_id'],
                'ped_data'  => Sistema::Fdata($lista['ped_data']),
                'ped_data_us'  => $lista['ped_data'],
                'ped_hora'   => $lista['ped_hora'],
                'ped_cliente' => $lista['ped_cliente'],
                'ped_cod'   => $lista['ped_cod'],
                'ped_ref'     => $lista['ped_ref'],
                'ped_pag_status' => $lista['ped_pag_status'],
                'ped_pag_link'   => $lista['ped_pag_link'],
                'ped_pag_tipo'    => $lista['ped_pag_tipo'],
                'ped_pag_codigo'   => $lista['ped_pag_codigo'],
                'ped_frete_valor' => $lista['ped_frete_valor'],
                'ped_frete_tipo'  => $lista['ped_frete_tipo'],
                'cli_nome'  => $lista['cli_nome'],
                'cli_sobrenome'  => $lista['cli_sobrenome'],
                'ped_cliente_entrega'  => $lista['ped_cliente_entrega'],
                'ped_entrega'  => $lista['ped_entrega'],
            );
        
        
            $i++;
        
        endwhile;
        
        
    }






    function GetPedidosREF($ref){
        
      // monto a SQL
    $query = "SELECT * FROM {$this->prefix}pedidos p INNER JOIN {$this->prefix}clientes c";
    $query.= " ON p.ped_cliente = c.cli_id";        
    $query .= " WHERE ped_ref = :ref";
    $query .= $this->PaginacaoLinks("ped_id", $this->prefix."pedidos WHERE ped_ref = ".$ref);
    
    // passando parametros
    $params = array(':ref'=>$ref);
   // executando a SQL                      
    $this->ExecuteSQL($query,$params);
    // trazendo a listagem 
    $this->GetLista();
}



 function GetPedidosDATA($data_ini,$data_fim){
    
     // montando a SQL
    $query = "SELECT * FROM {$this->prefix}pedidos p INNER JOIN {$this->prefix}clientes c";
    $query.= " ON p.ped_cliente = c.cli_id";
    
    $query.= " WHERE ped_data between :data_ini AND :data_fim ";

    $query .= $this->PaginacaoLinks("ped_id", $this->prefix."pedidos WHERE ped_data between ".$data_ini." AND ".$data_fim); //não esta funcionando para datas
      
   // passando os parametros  
    $params = array(':data_ini'=>$data_ini, ':data_fim'=>$data_fim);
    
    // executando a SQL
    $this->ExecuteSQL($query,$params);
    
    $this->GetLista();
}




function  Apagar($ped_cod){
    
    // apagando o PEDIDO  
    
    // monto a minha SQL de apagar o pedido 
    $query =  " DELETE FROM {$this->prefix}pedidos WHERE ped_cod = :ped_cod";        
    // parametros
    $params = array(':ped_cod'=>$ped_cod);
    // executo a minha SQL
    $this->ExecuteSQL($query, $params);
    
    /// apos apagar o pedido apaga ITENS DO PEDIDO  
    
                // monto a minha SQL de apagar os items 
             $query =  " DELETE FROM {$this->prefix}pedidos_itens WHERE item_ped_cod = :ped_cod";

             // parametros
             $params = array(':ped_cod'=>$ped_cod);
             // executo a minha SQL
             if($this->ExecuteSQL($query, $params)):
                 return TRUE;
             endif;
    
}






	function ItensGravar($codpedido){
		$carrinho = new Carrinho();
		foreach ($carrinho->GetCarrinho() as $item) {
			
			$query  = "INSERT INTO ".$this->prefix."pedidos_itens ";
	        $query .= "(item_produto, item_valor, item_qtd, item_ped_cod)";
	        $query .= "VALUES  (:produto,:valor,:qtd,:cod)";
                
                $params = array(
                ':produto' => $item['pro_id'],
                ':valor'   => $item['pro_valor_us'],
                ':qtd'     => (int)$item['pro_qtd'],
                ':cod'     =>  $codpedido  
                );

                $this->ExecuteSQL($query, $params);
                

		}
	}


   // função que vai atualizar o status do pedido
   function Alterar($referencia,$statusPedido){
          
    $query = " UPDATE {$this->prefix}pedidos SET ped_pag_status=:ped_pag_status";
    $query.= " WHERE ped_ref = :ped_ref";
   
    
    $params = array(
    ':ped_pag_status'=> $statusPedido,   
    ':ped_ref'=> $referencia,   
                 
    ); 
    
       // executo a SQL
       if($this->ExecuteSQL($query, $params)):
           
               return TRUE;
           
           else:
               
               return FALSE; 
           
       endif;
    
    
       
       
    }


	function LimparSessoes(){
		unset($_SESSION['PRO']);
		unset($_SESSION['PED']['pedido']);
    unset($_SESSION['PED']['ref']);
		
	}

}

 ?>
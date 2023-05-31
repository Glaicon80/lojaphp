<?php
class Correios{
	
        public       
  	        $frete = array(), $error,       
		$servico, $servico2, $cepOrigem, $cepDestino, $peso, $formato = '1',
		$comprimento, $altura, $largura, $diametro, $maoPropria = 'N',
		$valordeclarado = '0', $avisoRecebimento = 'N',
		$retorno = 'xml';
		
	private $url   = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
        private $sedex = '04014';
        private $pac   = '04510';
        /**
         * @param string cep destino
         * @param  float peso 
         */
        function __construct($destino,$peso,$comprimento,$largura,$altura) {
         
		        //tipo de servicos, ou seja, sedex, pac, sedex 10, esses codigos voce encontra no PDF que mencionei acima
				$this->servico 	        = $this->pac;  // PAC
				$this->servico2 	= $this->sedex; // sedex
				
				//cep de origem, ou seja, de onde parte
				$this->cepOrigem 	= Config::SITE_CEP;
				
				//cep destino, ou seja, para onde vai ser mandado
				$this->cepDestino 	= $destino;
				
				//peso em kilogramas
				$this->peso 		= $peso;
				$this->comprimento      = $comprimento;//em cm
				$this->altura 		= $altura;//em cm
				$this->largura     	= $largura;//em cm
				$this->diametro 	= '0';//em cm
            
        }

        /**
		 faz a verificação e calculo do frete
		**/
        public function Calcular(){

            // curl é utilizado para fazer requisições em APIs
			
			// curl_init nós colocamos a url da API a ser consulmida, que no caso é a dos correios
			$cURL = curl_init(sprintf(
				$this->url.'?nCdServico=%s&sCepOrigem=%s&sCepDestino=%s&nVlPeso=%s&nCdFormato=%s&nVlComprimento=%s&nVlAltura=%s&nVlLargura=%s&nVlDiametro=%s&sCdMaoPropria=%s&nVlValorDeclarado=%s&sCdAvisoRecebimento=%s&StrRetorno=%s',
				$this->servico,
				$this->cepOrigem,
				$this->cepDestino,
				$this->peso,
				$this->formato,
				$this->comprimento,
				$this->altura,
				$this->largura,
				$this->diametro,
				$this->maoPropria,
				$this->valordeclarado,
				$this->avisoRecebimento,
				$this->retorno
			));
			
            
            //curl_setopt vai fazer algumas configurações 
			curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true); // CURLOPT_RETURNTRANSFER vai fazer que o resultado  venha na forma de um objeto (array), se não colocar o resultado vai vim na forma de uma string com tudo embolado

			$string = curl_exec($cURL); // curl_exec vai executar a pesquisa e vai retornar o resultado que vai ser um array para ser jogado no foreach
			
			curl_close($cURL);// finaliza o curl
			$xml = simplexml_load_string($string); // simplexml_load_string — Interpreta uma string XML e a transforma em um objeto
			


			$cURL1 = curl_init(sprintf(
				$this->url.'?nCdServico=%s&sCepOrigem=%s&sCepDestino=%s&nVlPeso=%s&nCdFormato=%s&nVlComprimento=%s&nVlAltura=%s&nVlLargura=%s&nVlDiametro=%s&sCdMaoPropria=%s&nVlValorDeclarado=%s&sCdAvisoRecebimento=%s&StrRetorno=%s',
				$this->servico2,
				$this->cepOrigem,
				$this->cepDestino,
				$this->peso,
				$this->formato,
				$this->comprimento,
				$this->altura,
				$this->largura,
				$this->diametro,
				$this->maoPropria,
				$this->valordeclarado,
				$this->avisoRecebimento,
				$this->retorno
			));
			
            
            //curl_setopt vai fazer algumas configurações 
			curl_setopt($cURL1, CURLOPT_RETURNTRANSFER, true); // CURLOPT_RETURNTRANSFER vai fazer que o resultado  venha na forma de um objeto (array), se não colocar o resultado vai vim na forma de uma string com tudo embolado

			$string1 = curl_exec($cURL1); // curl_exec vai executar a pesquisa e vai retornar o resultado que vai ser um array para ser jogado no foreach
			
			curl_close($cURL1);// finaliza o curl
			$xml1 = simplexml_load_string($string1); 





			
			
			if($xml->Erro != ''){
			
				$this->error = array($xml->cServico->Erro, $xml->cServico->MgsErro);
				return false;


			}else if($xml1->Erro != ''){	

				$this->error = array($xml1->cServico->Erro, $xml1->cServico->MgsErro);
				return false;
			
			}else{

				$arrayXml = array($xml->cServico,$xml1->cServico);
                            
                    $i = 0;               
                    foreach ($arrayXml as $servico):
                            
					if($servico->Codigo =='04014')	  {

						$this->frete[$i]['tipo'] = 'SEDEX';    

					}else{
						$this->frete[$i]['tipo'] = 'PAC';    
					}
					    
                    $this->frete[$i]['valor']  = $servico->ValorSemAdicionais;                          
                    $this->frete[$i]['Prazo']  = $servico->PrazoEntrega;    
                    $this->frete[$i]['erro']   = $servico->Erro;    
                    $this->frete[$i]['MsgErro']   = $servico->MsgErro;    
                    $this->frete[$i]['Codigo']   = $servico->Codigo;    
                   
					  $i++;   
					  
					endforeach; 
 
                                    
                return $xml;
			
				};
}
		
		/*
		* mostrando erros 
		*/
		public function error(){
			if(is_null($this->error)){
				return false;
			}else{
				return $this->error;
			}
		}
	}
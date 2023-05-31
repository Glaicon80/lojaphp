<?php



class Api{

  /**
   * URL base do PSP
   * @var string
   */
  private $baseUrl;

  /**
   * Client ID do oAuth2 do PSP
   * @var string
   */
  private $clientId;

  /**
   * Client secret do oAuht2 do PSP
   * @var string
   */
  private $clientSecret;

  /**
   * Caminho absoluto até o arquivo do certificado
   * @var string
   */
  private $certificate;


  /**
   * Caminho absoluto até o arquivo do keycertificado
   * @var string
   */
  private $keyCertificate;


  /**
   * Define os dados iniciais da classe
   * @param string $baseUrl
   * @param string $clientId
   * @param string $clientSecret
   * @param string $certificate
   * @param string $keyCertificate
   */
  public function __construct($baseUrl,$clientId,$clientSecret,$certificate,$keyCertificate){
    $this->baseUrl      = $baseUrl;
    $this->clientId     = $clientId;
    $this->clientSecret = $clientSecret;
    $this->certificate  = $certificate;
    $this->keyCertificate  = $keyCertificate;
  }

  /**
   * Método responsável por criar uma cobrança imediata - vai criar o pix de pagamento
   * @param  string $txid
   * @param  array $request
   * @return array
   */
  public function createCob($txid,$request){
    return $this->send('PUT','/instant-payments/cob/'.$txid,$request); //send é o metodo que vai fazer as requisições via PUT a API do Pix do pagseguro
  }

  /**
   * Método responsável por consultar uma cobrança imediata
   * @param  string $txid
   * @return array
   */
  public function consultCob($txid){               // este é o metodo que vai fazer as consultas na API do PS para verificar o status da transação (ATIVA ou CONCLUIDA)
    return $this->send('GET','/instant-payments/cob/'.$txid);    // ativa quer dizer que não foi paga, concluida pode ser que foi paga (tem que olhar o valores para ter certeza)
  }


  /**
   * Método responsável por obter o token de acesso às APIs Pix
   * @return string
   */
  public function getAccessToken(){ // metodo para obter o token, pois ele é necessario para fazer as requisições
      
   $autorizacao =  base64_encode($this->clientId . ":" . $this->clientSecret);

    

    //CONFIGURAÇÃO DO CURL
    $curl = curl_init();
    curl_setopt_array($curl,array(
      CURLOPT_URL            => $this->baseUrl.'/pix/oauth2', // passando a url para obter o token
      CURLOPT_RETURNTRANSFER => true, // vamos salvar o retorno em uma variavel
      CURLOPT_CUSTOMREQUEST  => 'POST', // metodo determinado na documentação
      CURLOPT_POSTFIELDS     => '{"grant_type": "client_credentials"}', // vamos enviar o corpo doa requisição no formato json
      CURLOPT_SSLCERT        => $this->certificate, // vamos passar o certificado obtido no pagseguro junto com o clientId e o clientSecret
      CURLOPT_SSLKEY         => $this->keyCertificate,
      CURLOPT_SSLCERTPASSWD  => '', // senha do certificado, como é sandbox não tem senha
      CURLOPT_HTTPHEADER     =>array(
        "Authorization: Basic $autorizacao", // vamos passar o cabeçario
        "Content-Type: application/json"
    ),  
    ));

    //EXECUTA O CURL
    $response = curl_exec($curl);
    curl_close($curl);

    //RESPONSE EM ARRAY
    $responseArray = json_decode($response,true);

    //RETORNA O ACCESS TOKEN
   return $responseArray['access_token'] ?? '';// vamos pegar do array apenas o token, se não tiver vai retornar vazio 
  }


  /**
   * Método responsável por enviar requisições para o PSP
   * @param  string $method
   * @param  string $resource
   * @param  array  $request
   * @return array
   */
  private function send($method,$resource,$request = []){ //este é o metodo que vai fazer todas as requisições, passando o metodo (put, post ou get), dados do caminho, e o corpo da requisição (quando nao ouver vai ser um array vazio)
    //ENDPOINT COMPLETO 
    $endpoint = $this->baseUrl.$resource;

    //HEADERS
    $headers = [
      'Cache-Control: no-cache',
      'Content-type: application/json',
      'Authorization: Bearer '.$this->getAccessToken() //aqui vamos chamar o metodo acima para obter o token que vai ser do tipo bearer
    ];

    //CONFIGURAÇÃO DO CURL
    $curl = curl_init();
    curl_setopt_array($curl,[
      CURLOPT_URL            => $endpoint, // url da requisição
      CURLOPT_RETURNTRANSFER => true, // vamos pegar a resposta e salvar em uma variavel
      CURLOPT_CUSTOMREQUEST  => $method, // put, post ou get
      CURLOPT_SSLCERT        => $this->certificate, // temos que apresentar o certificado
      CURLOPT_SSLKEY         => $this->keyCertificate,
      CURLOPT_SSLCERTPASSWD  => '', // a senha do certificado, que no sandbox é vazia
      CURLOPT_HTTPHEADER     => $headers // passando o cabeçario
    ]);

    switch ($method) { // aqui colocamos o corpo da requisição separado, pois se for get, não tem corpo da requisição
      case 'POST':
      case 'PUT':
        curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($request));
        break;
    }

    //EXECUTA O CURL
    $response = curl_exec($curl);
    curl_close($curl);

    //RETORNA O ARRAY DA RESPOSTA
    return json_decode($response,true);
  }


}


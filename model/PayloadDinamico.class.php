<?php

// a diferença do payload dinamico é que é acrescento mais dois termos
// const ID_POINT_OF_INITIATION_METHOD = '01';
// const ID_MERCHANT_ACCOUNT_INFORMATION_URL = '25';

class PayloadDinamico{

  /**
  * IDs do Payload do Pix
  * @var string
  */
  const ID_PAYLOAD_FORMAT_INDICATOR = '00';
  const ID_POINT_OF_INITIATION_METHOD = '01'; // aqui vamos informar que esse pix só pode ser pago uma unica vez
  const ID_MERCHANT_ACCOUNT_INFORMATION = '26';
  const ID_MERCHANT_ACCOUNT_INFORMATION_GUI = '00';
  const ID_MERCHANT_ACCOUNT_INFORMATION_KEY = '01';
  const ID_MERCHANT_ACCOUNT_INFORMATION_DESCRIPTION = '02';
  const ID_MERCHANT_ACCOUNT_INFORMATION_URL = '25'; // aqui vamos passar a url do pagseguro que foi retornada na criação do pix (da cobrança)
  const ID_MERCHANT_CATEGORY_CODE = '52';
  const ID_TRANSACTION_CURRENCY = '53';
  const ID_TRANSACTION_AMOUNT = '54';
  const ID_COUNTRY_CODE = '58';
  const ID_MERCHANT_NAME = '59';
  const ID_MERCHANT_CITY = '60';
  const ID_ADDITIONAL_DATA_FIELD_TEMPLATE = '62';
  const ID_ADDITIONAL_DATA_FIELD_TEMPLATE_TXID = '05';
  const ID_CRC16 = '63';

  /**
   * Chave pix
   * @var string
   */
  private $pixKey; // em sandbox pode ser qualquer chave

  /**
   * Descrição do pagamento
   * @var string
   */
  private $description; //vai aparecer para o cliente qdo ele for pagar o pix

  /**
   * Nome do titular da conta
   * @var string
   */
  private $merchantName; //nome da loja

  /**
   * Cidade do titular da conta
   * @var string
   */
  private $merchantCity;

  /**
   * ID da transação pix
   * @var string
   */
  private $txid; // o txid para o pix dinamico tem que ter entre 26 a 35 caracteres com letras e numeros. e ele só pode ser usado uma unica vez , ou seja , para outro pix tem que fazer um novo

  /**
   * Valor da transação
   * @var string
   */
  private $amount;

  /**
   * Define se o pagamento deve ser feito apenas uma vez
   * @var boolean
   */
  private $uniquePayment = false; // variavel que só tem no pix dinamico, dizendo que esse pix só pode ser pago uma vez

  /**
   * URL do payload dinâmico
   * @var string
   */
  private $url; // url passado na resposta da cobrança em location, vamos passar essa url para o payload

  /**
   * Método responsável por definir o valor de $pixKey
   * @param string $pixKey
   */
  public function setPixKey($pixKey){
    $this->pixKey = $pixKey;
    return $this;
  }

  /**
   * Método responsável por definir o valor de $uniquePayment
   * @param boolean $uniquePayment
   */
  public function setUniquePayment($uniquePayment){
    $this->uniquePayment = $uniquePayment;
    return $this;
  }

  /**
   * Método responsável por definir o valor de $url
   * @param string $url
   */
  public function setUrl($url){
    $this->url = $url;
    return $this;
  }

  /**
   * Método responsável por definir o valor de $description
   * @param string $description
   */
  public function setDescription($description){
    $this->description = $description;
    return $this;
  }

  /**
   * Método responsável por definir o valor de $merchantName
   * @param string $merchantName
   */
  public function setMerchantName($merchantName){
    $this->merchantName = $merchantName;
    return $this;
  }

  /**
   * Método responsável por definir o valor de $merchantCity
   * @param string $merchantCity
   */
  public function setMerchantCity($merchantCity){
    $this->merchantCity = $merchantCity;
    return $this;
  }

  /**
   * Método responsável por definir o valor de $txid
   * @param string $txid
   */
  public function setTxid($txid){
    $this->txid = $txid;
    return $this;
  }

  /**
   * Método responsável por definir o valor de $amount
   * @param float $amount
   */
  public function setAmount($amount){
    $this->amount = (string)number_format($amount,2,'.',''); // o valor vai ser uma string com pto no decimal (decimal com duas casas) e sem nada no milhar
    return $this;
  }

  /**
   * Responsável por retornar o valor completo de um objeto do payload
   * @param  string $id
   * @param  string $value
   * @return string $id.$size.$value
   */
  private function getValue($id,$value){                   // esse metodo que vai montar a string com os dados passado pelo banco central
    $size = str_pad(mb_strlen($value),2,'0',STR_PAD_LEFT);  // size vai ser o tamanho dos caracteres com no minimo duas casas onde nos casos do tamano entre 1 a 9 vai colocar um zero a esquerda ex: 04
    return $id.$size.$value; // aqui motamos o padrao que o banco central definil
  }

  /**
   * Método responsável por retornar os valores completos da informação da conta
   * @return string
   */
  private function getMerchantAccountInformation(){
    //DOMÍNIO DO BANCO
    $gui = $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION_GUI,'br.gov.bcb.pix');

    //CHAVE PIX
    $key = strlen($this->pixKey) ? $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION_KEY,$this->pixKey) : ''; // aqui nao precisamos da chave pix pois ela ja vai estar na url abaixo, utilizamos apenas no payload statico, mas deixamos a opção vazio caso nao informemos

    //DESCRIÇÃO DO PAGAMENTO
    $description = strlen($this->description) ? $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION_DESCRIPTION,$this->description) : '';

    //URL DO QR CODE DINÂMICO
    $url = strlen($this->url) ? $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION_URL,preg_replace('/^https?\:\/\//','',$this->url)) : ''; // aqui vai ser pego a url no retorno da cobrança, e tiramos o https:// pois ele não pode aparecer a string do payload

    //VALOR COMPLETO DA CONTA
    return $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION,$gui.$key.$description.$url);
  }

  /**
   * Método responsável por retornar os valores completos do campo adicional do pix (TXID)
   * @return string
   */
  private function getAdditionalDataFieldTemplate(){
    //TXID
    $txid = $this->getValue(self::ID_ADDITIONAL_DATA_FIELD_TEMPLATE_TXID,$this->txid);

    //RETORNA O VALOR COMPLETO
    return $this->getValue(self::ID_ADDITIONAL_DATA_FIELD_TEMPLATE,$txid);
  }

  /**
   * Método responsável por retornar o valor do ID_POINT_OF_INITIATION_METHOD
   * @return string
   */
  private function getUniquePayment(){
    return $this->uniquePayment ? $this->getValue(self::ID_POINT_OF_INITIATION_METHOD,'12') : ''; // no payload statico nao precisa dele (pagamento unico) , por isso o vazio, se for verdadeiro o codigo vai ser 12 seguinifica que o pagamento sera unico, conforme o banco central
  }

  /**
   * Método responsável por gerar o código completo do payload Pix
   * @return string
   */
  public function getPayload(){
    //CRIA O PAYLOAD
    $payload = $this->getValue(self::ID_PAYLOAD_FORMAT_INDICATOR,'01').
               $this->getUniquePayment().
               $this->getMerchantAccountInformation().
               $this->getValue(self::ID_MERCHANT_CATEGORY_CODE,'0000').
               $this->getValue(self::ID_TRANSACTION_CURRENCY,'986').
               $this->getValue(self::ID_TRANSACTION_AMOUNT,$this->amount).
               $this->getValue(self::ID_COUNTRY_CODE,'BR').
               $this->getValue(self::ID_MERCHANT_NAME,$this->merchantName).
               $this->getValue(self::ID_MERCHANT_CITY,$this->merchantCity).
               $this->getAdditionalDataFieldTemplate();

    //RETORNA O PAYLOAD + CRC16
    return $payload.$this->getCRC16($payload);
  }

  /**
   * Método responsável por calcular o valor da hash de validação do código pix
   * @return string
   */
  private function getCRC16($payload) {
      //ADICIONA DADOS GERAIS NO PAYLOAD
      $payload .= self::ID_CRC16.'04';

      //DADOS DEFINIDOS PELO BACEN
      $polinomio = 0x1021;
      $resultado = 0xFFFF;

      //CHECKSUM
      if (($length = strlen($payload)) > 0) {
          for ($offset = 0; $offset < $length; $offset++) {
              $resultado ^= (ord($payload[$offset]) << 8);
              for ($bitwise = 0; $bitwise < 8; $bitwise++) {
                  if (($resultado <<= 1) & 0x10000) $resultado ^= $polinomio;
                  $resultado &= 0xFFFF;
              }
          }
      }

      //RETORNA CÓDIGO CRC16 DE 4 CARACTERES
      return self::ID_CRC16.'04'.strtoupper(dechex($resultado));
  }

}
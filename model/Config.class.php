<?php 

Class Config{

	//INFORMÃÇÕES BÁSICAS DO SITE
	const SITE_URL = "http://localhost/lojaphp";
	const SITE_PASTA = "";
	const SITE_NOME = "Loja do Glaicon";
	const SITE_EMAIL_ADM = "glaicon.florisbelo@gmail.com";
	const BD_LIMIT_POR_PAG = 6; //aqui a gente escole qtos itens vao aparecer por pagina
	const SITE_CEP = '38406200'; //esse vai ser o cep de origem


	//INFORMAÇÕES DO BANCO DE DADOS
	const BD_HOST = "localhost",
		  BD_USER = "root",
		  BD_SENHA = "",
		  BD_BANCO = "lojaphp",
		  BD_PREFIX = "qc_";


	//INFORMAÇÕES PARA PHP MAILLER
	const EMAIL_HOST = "smtp.gmail.com"; //pego do gmail , esse sera o servidor de envio de email
	const EMAIL_USER = "glaicon.florisbelo@gmail.com"; //esse é o email da loja que vai enviar email para os clientes
	const EMAIL_NOME = "Contato Loja Glaicon"; //vai ser o titulo que vai aparecer na lista de emails do cliente
	const EMAIL_SENHA = "engenheiro1980";  // usar a senha do email da loja
	const EMAIL_PORTA = 587; // o gmail trabalha com essa porta para segurança tls
	const EMAIL_SMTPAUTH = true;
	const EMAIL_SMTPSECURE = "ssl"; // pego do gmail, essa vai ser a segurança que iremos trabalhar , a outra opção é o ssl
	const EMAIL_COPIA = "glaicon.florisbelo@gmail.com";




	//CONSTANTES PARA O PAGSEGURO
	const PS_EMAIL  = "glaicon.florisbelo@gmail.com"; // email do pagseguro
    const PS_TOKEN  = "9036d8e7-408a-4722-ab2d-f3ed2a37ad1fb782422b486fb7511da314705463719cd388-07e0-4a1d-a722-1a79edf7da13"; // token produção
    const PS_TOKEN_SBX = "6DFD379F55664CADB25451422481073A";  // token do sandbox
   





	/**
	 * Configurações do Pix
	 */

	//DADOS GERAIS DO PIX (DINÂMICO E ESTÁTICO)
	const PIX_KEY = "12345678909"; //aqui vai ser uma chave de pix valida, que no meu caso é o telefone, no sandbox pode ser qualquer coisa
	const PIX_MERCHANT_NAME = "Loja do Glaicon";
	const PIX_MERCHANT_CITY = 'Uberlandia';

	//DADOS DA API PIX (DINÂMICO)
	const API_PIX_URL ='https://secure.api.pagseguro.com';
	const API_PIX_CLIENT_ID = '7668df5a-9195-11eb-a8b3-0242ac130003';
	const API_PIX_CLIENT_SECRET = '7a317732-9195-11eb-a8b3-0242ac130003';
	const API_PIX_CERTIFICATE = '../view/arquivos/glaicon-prod.pem';
	const API_PIX_KEYCERTIFICATE = '../view/arquivos/glaicon-prod.key';






    //CONSTANTES PAGSEGURO PARA CREIDITO, DEBITO E BOLETO

    const PS_AMBIENTE = "sandbox"; // production   /  sandbox

	const TOKEN_PAGSURO_SD = "6DFD379F55664CADB25451422481073A";
	const URL_PAGSEGURO_SD = "https://ws.sandbox.pagseguro.uol.com.br/v2/";
	const SCRIPT_PAGSEGURO_SD ="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js";
	
	const EMAIL_VENDEDOR = "glaicon.florisbelo@gmail.com"; //seu email no pagseguro
	const MOEDA_PAGAMENTO = "BRL";
	const URL_NOTIFICACAO = "https://loja.meunegocioweb.com/controller/notificacao.php";
	
	const TOKEN_PAGSURO = "9036d8e7-408a-4722-ab2d-f3ed2a37ad1fb782422b486fb7511da314705463719cd388-07e0-4a1d-a722-1a79edf7da13";
	const URL_PAGSEGURO = "https://ws.pagseguro.uol.com.br/v2/";
	const SCRIPT_PAGSEGURO = "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js";
	
	
}
 ?>
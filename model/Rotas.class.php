<?php 

class Rotas{ // aqui nessa classe vamos tratar as urls para que elas fiquem mais amigaveis

    public static $pag;
    private static $pasta_controller ='controller';
    private static $pasta_view = 'view';
	private static $pasta_media = 'media';
	private static $pasta_ADM = 'adm';

    static function get_Pagina(){ //esse metodo (função) sera static, ou seja, não precisa ser instanciado, o chamamos pelo nome da classe
		if(isset($_GET['pag'])){ // isset vai verificar se existe parametro enviado na  url atraves do get.

			$pagina = $_GET['pag']; //pag vai ser as informações que digitamos na url

			self::$pag = explode('/', $pagina); // self::$pag vai pegar $pagina e transformar em um array, onde as posições do array vão ser separadas qdo aparecer uma / pelo uso do explode
			                                    // tivemos que pegar a variavel e transformar em um array pois vai ter situações que teremos mais de um parametro na url ex: carrinho/id

			$pagina = 'controller/' .self::$pag[0] . '.php';
			
			if(file_exists($pagina)){  // aqui vai verificar se o arquivo (pagina) existe
				include $pagina; // se existir a pagina sera chamada e vai abrir dentro da index.tpl
			}else{
			include 'erro.php'; //se não existir a pagina vai abrir (incluir) a pagina erro dentro de index.tpl
		}

		}else{

			Rotas::Redirecionar(0, 'home.php');
			//include 'home.php'; //se não existir parametros na url vai abrir (incluir) a home dentro de index.tpl
		}
	}
	
	
	static function get_PaginaAdm(){ //esse metodo (função) sera static, ou seja, não precisa ser instanciado, o chamamos pelo nome da classe
		if(isset($_GET['pag'])){ // isset vai verificar se existe parametro enviado na  url atraves do get.

			$pagina = $_GET['pag']; //pag vai ser as informações que digitamos na url

			self::$pag = explode('/', $pagina); // self::$pag vai pegar $pagina e transformar em um array, onde as posições do array vão ser separadas qdo aparecer uma / pelo uso do explode
			                                    // tivemos que pegar a variavel e transformar em um array pois vai ter situações que teremos mais de um parametro na url ex: carrinho/id

			$pagina = 'controller/' .self::$pag[0] . '.php';
			
			if(file_exists($pagina)){  // aqui vai verificar se o arquivo (pagina) existe
				include $pagina; // se existir a pagina sera chamada e vai abrir dentro da index.tpl
			}else{
			include 'erro.php'; //se não existir a pagina vai abrir (incluir) a pagina erro dentro de index.tpl
		}

		}else{

			//Rotas::Redirecionar(0, 'home.php');
			include 'home.php'; //se não existir parametros na url vai abrir (incluir) a home dentro de index.tpl
		}
	}


	



    static function get_SiteHOME(){
		return Config::SITE_URL . '/' .Config::SITE_PASTA; // vai apresentar http://localhost/lojaphp
	}

    static function get_SiteRAIZ(){
		return $_SERVER['DOCUMENT_ROOT'] . '/' .Config::SITE_PASTA;  // vai apresentar C:/xampp/htdocs/lojaphp
	}


    static function get_SiteTEMA(){
		return  self::get_SiteHOME(). '/' .self::$pasta_view; // vai apresentar http://localhost/lojaphp/view
	}

	static function get_SiteMEDIA(){
		return  self::get_SiteHOME(). '/' .self::$pasta_media; // vai apresentar http://localhost/lojaphp/media
	}

    static function pag_Carrinho(){
		return  self::get_SiteHOME(). '/carrinho'; // vai apresentar http://localhost/lojaphp/carrinho

}

static function pag_MinhaConta(){
	return  self::get_SiteHOME(). '/minhaconta'; // vai apresentar http://localhost/lojaphp/minnhaconta
}

static function pag_ClienteLogin(){
	return  self::get_SiteHOME(). '/login'; // vai apresentar http://localhost/lojaphp/login
}

static function pag_Contato(){
	return  self::get_SiteHOME(). '/contato';
}

static function pag_processa_pag_pix(){
	return  self::get_SiteHOME(). '/processa_pag_pix'; // vai apresentar http://localhost/lojaphp2/processa_pag_pix
}


static function pag_Produtos(){
	return  self::get_SiteHOME(). '/produtos';
}

static function pag_ClienteRecovery(){
	return  self::get_SiteHOME(). '/clientes_recovery';
}

static function pag_ClienteCadastro(){
	return  self::get_SiteHOME(). '/cadastro';
}

static function pag_ProdutosInfo(){
	return  self::get_SiteHOME(). '/produtos_info';
}


static function get_ImagePasta(){
	return 'media/images/';
}

static function get_ImageURL(){
	return self::get_SiteHOME() .'/' .self::get_ImagePasta();

}

static function pag_ClienteItens(){
	return  self::get_SiteHOME(). '/cliente_itens';
}

static function ImageLink($img, $largura, $altura){
	$imagem = self::get_ImageURL() ."thumb.php?src={$img}&w={$largura}&h={$altura}&zc=1";

	return $imagem;

}

static function pag_CarrinhoAlterar(){
	return  self::get_SiteHOME(). '/carrinho_alterar'; // http://localhost/lojaphp/carrinho_alterar
}

static function pag_ClienteConta(){
	return  self::get_SiteHOME(). '/minhaconta';
}

static function pag_Logoff(){
	return  self::get_SiteHOME(). '/logoff';
}

static function pag_CLientePedidos(){
	return  self::get_SiteHOME(). '/clientes_pedidos';
}

static function pag_CLienteDados(){
	return  self::get_SiteHOME(). '/clientes_dados';
}

static function pag_CLienteSenha(){
	return  self::get_SiteHOME(). '/clientes_senha';
}

static function get_Pasta_Controller(){
	return self::$pasta_controller;
}



//MÉTODO PARA REDIRECIONAR
static function Redirecionar($tempo, $pagina){
	$url = '<meta http-equiv="refresh" content="'.$tempo.'; url='. $pagina .'">';
	echo $url;
}





//rotas para área administrativa

static function get_SiteADM(){
	return self::get_SiteHOME() .'/' .self::$pasta_ADM;   //http://localhost/lojaphp/adm

}


static function pag_ProdutosADM(){
	return self::get_SiteADM() .'/adm_produtos';  //http://localhost/lojaphp/adm/adm_produtos

}

static function pag_ProdutosNovoADM(){
	return self::get_SiteADM() .'/adm_produtos_novo'; //http://localhost/lojaphp/adm/adm_produtos_novo

}

static function pag_ProdutosEditarADM(){
	return self::get_SiteADM() .'/adm_produtos_editar';

}

static function pag_ProdutosDeletarADM(){
	return self::get_SiteADM() .'/adm_produtos_deletar';

}

static function pag_ProdutosImgADM(){
	return self::get_SiteADM() .'/adm_produtos_img';

}



static function pag_ClientesADM(){
	return self::get_SiteADM() .'/adm_clientes';   //http://localhost/lojaphp/adm/adm_clientes

}


static function pag_ClientesEditarADM(){
	return self::get_SiteADM() .'/adm_clientes_editar'; //http://localhost/lojaphp/adm/adm_clientes_editar

}

static function pag_PedidosADM(){
	return self::get_SiteADM() .'/adm_pedidos';  //http://localhost/lojaphp/adm//adm_pedidos

}

static function pag_VendasADM(){
	return self::get_SiteADM() .'/vendas';  //http://localhost/lojaphp/adm/vendas

}

static function pag_ItensADM(){
	return self::get_SiteADM() .'/adm_itens'; //http://localhost/lojaphp/adm//adm_itens

}

static function pag_CategoriasADM(){
	return self::get_SiteADM() .'/adm_categorias';

}


static function pag_LogoffADM(){
	return self::get_SiteADM() .'/adm_logoff'; // http://localhost/lojaphp/adm/adm_logoff

}



}


?>
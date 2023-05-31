<?php 

Class Template extends SmartyBC{  //  a classe Template foi criada apenas para receber algumas configurações comuns para
	function __construct(){     // todas as paginas que trabalharão com a classe Smart.
		parent:: __construct();
                                        // as tres configurações abaixo serão padrão para outras paginas
		$this->setTemplateDir('view/'); // aqui vai mostrar o caminho ate os templates .tpl dentro da pasta view, sem isso nem um arquivo.tpl sera encontrado
		$this->setCompileDir('view/compile/'); //aqui vai ficar o caminho das compilações geradas pelo sistema, é bom colocar esse caminho se não vai ficar gerando muitos arquivos sem necessidade na raiz do site
		$this->setCacheDir('view/cache/'); // fazer esse caminho para guardar os caches gerados pelo sistema, tbm para remover isso da raiz

	}
}

 ?>
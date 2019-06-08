<?php 
require_once CORE . "smarty" . DS . "Smarty.class.php";

class View extends Smarty {
	
	//Configurações da view ===============================================================

	public $viewFolder	= 'view';
	public $scope		= 'web';
	public $entity 		= NULL;		//pasta que contém o template a ser carregado (a partir da raiz)
	public $template	= NULL; 	//guarda o nome do template que será carregado na renderização
	public $parents		= NULL;		//guarda o nome dos pais desse template, em ordem genealógica
	public $htmlTpl		= 'html';	//template que guarda a estrutura padrão html e será chamado em caso de falha
	
	public $render		= true;		//define se será renderizada uma view
	
	//Coisas que vão interferir no comportamento da página ================================
	
	public $title;			//para poder setar de onde quiser o título da página
	public $scripts;		//recebe os scripts que devem ser carregados automaticamente
	public $stylesheets;	//recebe os csss que devem ser carregados automaticamente
	
	//Variáveis além das herdadas pelo smarty que servem para controle interno do sistema =

	/**
	 * @var Controller $controller - instância do controller que chamou essa view
	 */
	public $controller; 	//Instancia do controller que chamou essa view	
	public $data; 			//dados passados por $data do controller (só os helpers terão acesso)
	public $tpl_confs; 		//array com coisas à serem exibidas	
	public $tempConfs;		//array com configurações temporárias
	
	public $styles_root; 	//Caminho virtual da pasta CSS
	public $script_root;	//Caminho virtual da pasta JS

	// Modificando as variáveis padrão do smarty ==========================================
	
    public $compile_check = true; 	// check template for modifications?
    public $caching = false; 		// caching enabled
    public $cache_lifetime = 3600; 	// cache lifetime
    public $debugging = false; 		// debug mode

	//PATHS ===============================================================================

	public $scopeFolders = array(
		'core', 'web', 'mobile', 'modules'
	);

	public $typeFolders = array(
		'pages', 'styles', 'scripts', 'images', 'audios', 'icons', 'fonts'
	);

	public $viewPaths = null;

	// ====================================================================================
	
	public function __construct()
    {
		parent::__construct();

		$this->template_dir = array(VIEW.$this->scope.'/pages/', VIEW.'core/pages/', VIEW.$this->scope.'/pages/');
		$this->compile_dir = TEMP.'tpl_compile/';
		$this->plugins_dir = array(SMARTY_PLUGINS_DIR, CORE.'helpers/', APP_ROOT . "view/helpers/");
		$this->cache_dir = TEMP.'tpl_cache/';
		$this->config_dir = VIEW.$this->scope.'/configs/';
		$this->debug_tpl = 'file:'.VIEW.'core/pages/debug/smartyDebug.tpl';
		
		$this->tempConfs = array();

		$this->tpl_confs = array 
		(
			'root' => WEB_ROOT,
			'pageTitle' => isset($this->title) ? $this->title : '',
			'description' => null, 
			'keywords' => null, 
			'pageTitle' => null,
			'author' => null,
		);

		$this->setPaths();
	}

	/**
	 * Preenche as variáveis de instância $physicalPaths
	 *
	 * Exclusivamente aqui se encontra a correlação entre a abstração de camandas chamada no template e o sistema de arquivos
	 */
	public function setPaths()
	{
		$viewFolder = $this->viewFolder;
		$paths = array();

		foreach ( $this->scopeFolders as $scope )
		{
			$paths[$scope] = array();
			foreach ( $this->typeFolders as $type )
			{
				$this->viewPaths['physical'][$scope][$type] = APP_ROOT."$viewFolder/$scope/$type";
				$this->viewPaths['virtual'][$scope][$type] 	= WEB_ROOT."$viewFolder/$scope/$type";
			}
		}

        $this->viewPaths['virtual']['root'] = WEB_ROOT;
        $this->viewPaths['virtual']['url'] = URL;

		$this->viewPaths['physical']['this']	= $this->viewPaths['physical'][$this->scope];
		$this->viewPaths['virtual']['this'] 	= $this->viewPaths['virtual'][$this->scope];
	}

	/**
	 * Retorna uma url dependendo dos parâmetros passados
	 *
	 * @param string $type Tipo de conteúdo ('pages', 'styles', 'scripts', 'images', 'icons', 'fonts') de acordo com a var $this->typeFolders
	 * @param string $entity Entidade pertencente = controller / pasta aonde se localiza o template (deixe null para raiz)
	 * @param string $scope	Escopo ao qual pertence o diretório ('core', 'web', 'mobile', 'modules') de acordo com a va $this->scopeFolders
	 * @param bool $virtual true = caminho virtual (http://...) false = caminho físico (c:\\apache\)
	 *
	 * @return String $path Caminho desejado
	 */
	public function getPath($type, $entity = null, $scope = 'this', $virtual = TRUE)
	{
		$kind = $virtual ? 'virtual' : 'physical';
		if ( $entity == 'this' ) $entity = $this->entity;
		$path = $this->viewPaths[$kind][$scope][$type];
		$entity and $path .= "/$entity";
		return $path;
	}

	/**
	 * Transforma as variáveis de configuração de templates (até então na instância da view) em variáveis de template de fato.
	 */
	public function loadConfigs()
	{
		$this->assign('confs', $this->tpl_confs);
		$this->assign('paths', $this->viewPaths['virtual']);
	}

	/**
	 * Chama a classe view e renderiza a tela a partir dela (esse método é chamado automaticamente)
	 */
	public function render()
	{
		$htmlTpl 		= $this->htmlTpl;		
		$template 		= $this->template 
		or $template 	= $this->template 	= $this->controller->actionCalled; //Se não tiver setado nada pega o nome da action
		$folder			= $this->entity
		or $folder		= $this->entity 	= $this->controller->name; 	//Equivalente ao caso do nome de cima.

		$this->template_dir[0] .= "$folder/";
				
		if ($template && $this->render)
		{
			$this->data = $this->controller->data;
			
			$this->loadConfigs();


			// prepara a string de load incluindo a herança -------------------------

			$toLoad = '';

			if ( $this->parents !== NULL )
			{
				$toLoad .= 'extends:';

				if ( is_array($this->parents) ) foreach ( $this->parents as $parent )
				{
					$toLoad .= "$parent.tpl|";
				}
			else
				{
					$toLoad .= $this->parents.'.tpl|';
				}

			}

			$toLoad .= "$template.tpl";

            //TODO transformar isso em debug do template
//			echo '<pre>';
//			echo $this->template_dir[0];
//			echo '<br>';
//			echo $toLoad;
//			echo '<br>';
//			print_r($this->virtualPaths);
//			echo '</pre>';
//			die();

			// ----------------------------------------------------------------------
			
			try //tenta com a herança que foi declarada em variáveis
			{
				$this->display($toLoad);
			} 
			catch (Exception $e) //se não foi
			{
				trigger_error('Erro ao tentar carregar template: ' . $e->getMessage() . ' - loaded folder: "' . $this->template_dir[0] . '"', E_USER_WARNING);

				try //tenta de novo só com o template
				{
					$this->display("$template.tpl");
				}
				catch (Exception $e) //se não foi carrega o layout em branco e mensagem de erro
				{
					trigger_error('Erro ao tentar carregar template: ' . $e->getMessage() . ' - loaded folder: "' . $this->template_dir[0] . '"', E_USER_WARNING);
					
					try 
					{
						$this->display(VIEW . "web/pages/$htmlTpl.tpl");
					}
					catch (Exception $e)
					{
						trigger_error("Não foi possível exibir página html padrão! provavelmente o arquivo não existe ou a estrutura de arquivos está comprometida. ERRO MSG: " . $e->getMessage(), E_USER_ERROR);
					}
					
				}
				
			}
		}
		else 
		{
			//em caso de variável view não estar definida!
			trigger_error("Variével contendo o nome da view não definida!", E_USER_WARNING);
		}
	}
	
	public function setTemp($key, $value)
	{
		if ( isset($this->tempConfs[$key]) ) trigger_error("Essa variavel de configuração temporária da view já estava setada!!", E_USER_WARNING);
		$this->tempConfs[$key] = $value;
	}
	
	public function getTemp($key)
	{
		if ( isset($this->tempConfs[$key]) )
		{
            $temp = &$this->tempConfs[$key];
			return $temp;
		}
		else
		{
			return NULL;
		}		
	}

    public function unsetTemp($key)
    {
        unset($this->tempConfs[$key]);

    }

	/**
	 * @param $action the destinys action to be tested
	 * @param $controller the destinys controller to be tested
	 * @return bool true = active, false = normal
	 */
	public function testLinkActivityState($action, $controller)
	{
		return ( $this->controller->actionCalled == $action && $this->controller->name = $controller );
	}

	public function getInputType($name, $modelName)
	{
		return $this->controller->{$daoName}->types[$name];
	}
}
?>
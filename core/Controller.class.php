<?php
require_once CORE.'View.class.php';
require_once CORE.'Model.class.php';

class Controller 
{	
	public $name;			// recebe automaticamente o nome do controller
	public $actionCalled;	// receberá o nome da action que foi chamada
	
	public $defaultControllerName 	= DEFAULT_CONTROLLER_NAME;
	public $defaultActionName 		= DEFAULT_ACTION_NAME;
	public $defaultModelName 		= NULL;	// nome do modelo que será carregado autometicamente
											// (o usuário pode sobreescreve-lo na classe herdada.)

	/** @var Debugger $debugger - recebe instância da classe debugger (também disponível em escopo global) */
	public $debugger;
	/** @var View $view - recebe nova instância da classe View, que herda de Smarty */
	public $view;
	/** @var DataStream $data - manipula dados vindos e voltando de formulários */
	public $data;
	
	private $flash;
	private $history;
    public  $formModels;

	// END variables declaration ===========================================================
	
	public function __construct()
	{
		//inicia o uso da session e seta o nome dela
		session_name(SESSION_NAME);
		session_start();
		
	//	$this->data = new DataStream();

        $this->retrieveData($this->data, $_POST['data']);

		$this->view = new View();
		$this->view->controller = $this;

		$this->debugger = $GLOBALS['debugger'];
		
		$this->flash = &$_SESSION['_ENGINE_CONTROLER']['FLASH'];
		is_array($this->flash) or $this->flash = array();

		$this->history = &$_SESSION['_ENGINE_CONTROLER']['PREVIOUS_URLS'];
		is_array($this->history) or $this->history = array();
	}
	
	// FUNÇÕES UTILITÁRIAS =================================================================
	
	/**
	 * Passa uma variável para a view!
	 *
	 * @param String|NULL $name nome que a variável receberá na view ou Array com lista de pares nome => valor
	 * @param Mixed|Model $value Valor que será passado para ela
	 */
	public function set($name = NULL, $value = NULL)
	{
		$args = func_get_args();

        if ( $value instanceof Model )
        {
            $value = $value->to_array_deep();
        }

		call_user_func_array(array($this->view, 'assign'), $args);
	}

    /**
     * Transforma os dados vindos de $dataArr (normalmente do $_POST) em models.
     *
     * @param $destination
     * @param $dataArr
     */
    public function retrieveData(&$destination, $dataArr)
    {
        foreach ( $dataArr as $key => $value )
        {
            if ( is_numeric($key) )
            {
                foreach ($value as $modelName => $atributes)
                {
                    $modelName = ucfirst($modelName);
                    $destination[$key] = new $modelName;

                    foreach ( $atributes as $name => $value )
                    {
                        if ( is_array($value) )
                        {
                            $this->retrieveData($destination->$name, $value);
                        }
                        else
                        {
                            $destination->$name = $value;
                        }
                    }
                }
            }
            else
            {
                $modelName = ucfirst($key);
                $destination[$key] = new $modelName;

                foreach ( $atributes as $name => $value )
                {
                    if ( is_array($value) )
                    {
                        $this->retrieveData($destination->$name, $value);
                    }
                    else
                    {
                        $destination->$name = $value;
                    }
                }
            }


        }
    }

    /**
     * Seta o modelos(s) que contém os values que serão impressos nos formulários da view
     *
     * @param Model $model
     */
    public function setFormModel($model)
    {
        $modelName = $model->table_name();

        $this->formModels[$modelName] = $model;
    }

	/**
	 * Redireciona para a página desejada
	 * 
	 * @param String $action Nome da action para a qual deseja ir
	 * @param String $controller (optional) Nome do controller para o qual deseja ir. Se não tiver nada setado vai para o próprio.
	 * @param Array ou String $params Valores que serão passados como parametros para a action
	 */
	public function go($action = NULL, $controller = NULL, $params = NULL)
	{
		if ( $action == $this->defaultActionName )
		{
			$action = NULL;
		}
		if ( $controller == NULL )
		{
			$controller = $this->name;
			
		}
		if ( $controller == DEFAULT_CONTROLLER_NAME )
		{
			$controller = NULL;
		}
		
		if ( !(is_array($params) || is_string($params) || is_numeric($params) ) )
		trigger_error("Formato de parametro inválido passado para a função de controller 'go' ", E_USER_WARNING);

		$params = is_array($params) ? implode("/", $params) : $params;
		
		$url  =  WEB_ROOT;
		$url .= is_string($controller)	? "$controller/" 	: '';
		$url .= is_string($action) 		? "$action/" 		: '';
        if($params != '') $url .= is_string($params)	 	? "$params/" 		: '';

		redirect($url);
	}	
	
	/**
	 * Redireciona para a última url acessada
	 * 
	 * @param Int $times Numero de vezes que deseja voltar
	 */
	public function goBack($times = 1)
	{
		$previous = null;
		while ( $times-- && $previous = array_pop( $this->history ) );
		if( !$previous ) $this->go();		
		redirect($previous);
	}
	
	/**
	 * Retorna a última mensagem setada na pilha de mensagens flash e a apaga.
	 *
	 * @param Bool $returnType Tipo de retorno true = array com tipo e msg, false = só msg
	 * @return Array ['msg'] e ['type'] ou String msg ou NULL caso não tenha msg
	 */
	public function flash($returnType = TRUE)
	{
		if ( $flash = array_pop($this->flash) ) 
		{
			if ( $returnType ) 
			{
				return $flash;
			}
			else 
			{
				return $flash['msg'];
			}
			
		}
		else
		{
			return NULL;
		}
	}
	
	/**
	 * Seta uma mensagem na pilha de mensagens flash.
	 *
	 * @param String $msg mensagem que será enviada
	 * @param String $type
	 */
	public function setFlash($msg, $type = NULL)
	{
		$this->flash[] = array('msg' => $msg, 'type' => $type);
	}
	

	// CALLBACK FUNCTIONS (Funções criadas para serem sobreescritas) =======================

	public function beforeAction(){
	}
	
	public function beforeRender(){
	}
	
	public function afterRender(){
	}

	public function error404(){
		echo '<p><b>Error 404:</b>Page Not Found.</p>';echo '<p><b>Error 404:</b>Page Not Found.</p>';
	}


	// FUNÇÕES INTERNAS (Não devem ser sobreescritas!!) ====================================

	/**
	 * Retorna uma instância da classe controller a partir do nome dado.
	 *
	 * @static
	 * @param $controllerName Nome do controller sem a palavra Controller ao final e com inicial minúscula
	 * @param $controllerFolder caminho para a pasta onde se encontra o dito cujo
	 * @return bool false ou instância do controller carregado
	 */
	static function loadController($controllerName, $controllerFolder) 
	{
		$controllerName or $controllerName = DEFAULT_CONTROLLER_NAME;
		$originalName 	= $controllerName;
		$controllerName = ucfirst($controllerName) . "Controller";
		$controllerPath = $controllerFolder."$controllerName.php";
				
		if ( !file_exists($controllerPath) ) 
		{
			trigger_error("Arquivo de controller $controllerName.php inexistente!", E_USER_NOTICE);
			return FALSE;
		}
				
		require $controllerPath;
		
		if ( !class_exists($controllerName) )
		{
			trigger_error("Classe do arquivo $controllerPath nomeada incorretamente!", E_USER_ERROR);
			return FALSE;
		}
		
		$controller 		= new $controllerName();
		$controller->name 	= $originalName;
		return $controller;
	}
	
	/**
	 * Executa uma action de acordo com o nome dado.
	 *
	 * @param $actionName
	 * @param $parameters
	 * @param Array $reservedMethods lista com todos os metodos que não podem ser chamados
	 * @return bool
	 */
	public function loadAction($actionName, $parameters, $reservedMethods = null)
	{
		$actionName or $actionName = $this->defaultActionName;
		
		if ( method_exists($this, $actionName) && !in_array($actionName, $reservedMethods) )
		{
			//limpa lixo que eventualmente vai parar nesse array parameters
			foreach( $parameters as $i => $p ) if( empty($p) ) unset($parameters[$i]);
			$this->actionCalled = $actionName;
			call_user_func_array(array($this, $actionName), $parameters);
			return TRUE;
		}
		else 
		{
			trigger_error("Action $actionName inexistente", E_USER_NOTICE);
			return FALSE;
		}
	}
	
	/**
	 * Carrega models automaticamente de acordo com o nome setado no controller
	 * e objetos carregados no stream de dados (TODO mudar isso para a classe de stream)
	 */
	public function loadDefaultDAOs()
	{
		if( !$this->defaultModelName ) $this->defaultModelName = $this->name;
		
		$this->loadModel($this->defaultModelName, FALSE);
		
		if( is_array($this->data) ) 
		foreach ( $this->data as $model => $data )
		{
			$this->loadModel($model, FALSE);
		}
	}

	/**
	 * Carrega no controller o modelo desejado (esse método é chamado automaticamente)
	 * 
	 * @param String $modelName (optional) nome do modelo. Se for vazio carrega o nome que está em $this->modelName
	 * @param Boolean $triggerError (optional) se for false não dispara nenhum warning
	 * @return Boolean False or Model loaded model
	 */
	public function loadDAO($modelName = NULL, $triggerError = TRUE)
	{

	}
	
	/**
	 * Salva url atual no histórico
	 */
	public function historyAdd()
	{
		//se for uma entrada inútil não faz nada
		if ( in_array($this->actionCalled, array('error404', 'error')) ) return;

		if( count($this->history) >= NAV_HISTORY_SIZE )
		{
			array_shift($this->history);
		}
		
		array_push($this->history, URL);
	}
}
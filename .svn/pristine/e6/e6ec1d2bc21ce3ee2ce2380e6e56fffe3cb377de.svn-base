<?php
/**
 * Esse arquivo contém apenas a classe Dispatcher.
 * Essa classe pega a url atual, divide ela e de acordo com ela faz o seguinte:
 * - Carrega um controller;
 * - Pede para o controller carregar o modelo padrão;
 * - Manda a view padrão se renderizar;
 * - Adiciona uma entrada ao histórico (chama função do controller para isso);
 * - Chama callbacks entre cada chamada das principais funcções que podem ser sobreescritos pelos controller filhos;
 * 
 * > Todas essas chamadas são feitas no construtor, então podem para alterar esse comportamento edite lá.
 * > Existem funções de callback que podem ser alteradas para cada mudança no comportamento para caso as chamadas padrão falhem
 */

class Dispatcher 
{
	private $reservedMethods; 
	private $urlBuffer;	
	public $url;
	public $controllersFolder = CONTROLLER;

    /** @var Controller */
	public $controller;	//instância da classe controller

	//==========================================================================================	
	
	/**
	 * Concentra aqui toda a execução da classe:
	 * Chama todas as funções que serão executadas para o funcionamento do dispatcher
	 */
	public function __construct()
	{
		$this->config();						// carrega variaveis de configuração
        $this->loadController();				// realiza testes e carrega controller
        $this->controller->beforeAction();
        $this->loadAction();					// realiza testes e executa a action
        $this->controller->beforeRender();
        $this->controller->view->render();		//manda a view se renderizar
        $this->controller->afterRender();
		$this->controller->historyAdd();
    }
	
	/// CONFIGURAÇÕES: =============================================================================
	
	/**
	 * Define quem é quem.
	 * Modifique aqui caso queira um comportamento diferente para urls 
	 * ou cole dentro de um if caso seja somente para algum pedaço específico da url
	 */
	public function config()
	{
		//corrige a url que veio como constante
		$URL	=	WEB_BASEPATH == '' 
					? str_replace('!@#$%&*/', '', '!@#$%&*'.URL) //substitui a primeira barra por ''
					: str_replace('/' . WEB_BASEPATH, '', URL); //
		
		// transforma a url corrigida em um vetor
        $this->url 			= explode('/', $URL);
        $this->urlBuffer 	= $this->url;
		
		//testa se veio algum get passado pelo htacess
		if( isset($_GET) && isset($_GET['error']) && $_GET['error'] == '404' ) 
		{
			$this->error404();
		}
		
		require CONTROLLER . "AppController.php";

		$controllerReservedMethods 		= get_class_methods('Controller');
		$appControllerReservedMethods 	= !AppController::$reservedMethods ? get_class_methods('AppController') : AppController::$reservedMethods;
		$this->reservedMethods 			= array_merge($controllerReservedMethods, $appControllerReservedMethods);
	}
	
	/// CARREGAMENTOS ========================================================================================
	
	/**
	 * Realiza testes e carrega o controller
	 */
	public function loadController()
	{
		$this->controller = Controller::loadController($this->urlBuffer[0], $this->controllersFolder);
		
		if ( $this->controller ) //se o controller for carregado corretamente avança o buffer
		{			
        	array_shift($this->urlBuffer);
		}
		else //senão chama o controller padrão e mantem o buffer
		{
			$this->controller = Controller::loadController(null, $this->controllersFolder);
			
			if ( !$this->controller )
			{		
	        	trigger_error("Não foi possível carregar nenhum controller", E_USER_WARNING);
				$this->error404();
			}
		}
	}
	
	/**
	 * Realiza testes e chama a action
	 */
	public function loadAction()
	{
		$actionName = isset($this->urlBuffer[0]) ? $this->urlBuffer[0]: null;
		$parameters = array_slice($this->urlBuffer, 1);

		$success = $this->controller->loadAction($actionName, $parameters, $this->reservedMethods);
		
        if ( !$success ) //se não conseguiu carregar a action chama a padrão e usa todo o buffer
        {
        	$parameters = $this->urlBuffer;
        	$success = $this->controller->loadAction(null, $parameters, $this->reservedMethods);
        
			if ( !$success ) //se nem assim for deu ruim total
			{
	            trigger_error("Não foi possível carregar nenhuma action!", E_USER_WARNING);
	            $this->error404();
			}
		}
	}
	
	public function error404()
	{
		echo '<p><b>Error 404: </b>Page Not Found.</p>';
		die();
		
//		error404();
	}
}

?>
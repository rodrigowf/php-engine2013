<?php
	require_once CORE . "Controller.class.php";
	require_once CORE . 'Auth.class.php';

	/**
	 * Use essa classe para fazer coisas que você quer que todos os seus controller façam magicamente.
	 */
	class AppController extends Controller 
	{
		/**
		 * Lista com métodos que não podem ser carregados como actions.
		 * se for null todos os metodos serão considerados reservados.
		 */
		static $reservedMethods = NULL;
		
		public $debugger;
		public $auth; 		//instância da classe auth
		public $translator; //instancia da classe XmlTranslator
		
		public function __construct()
		{
			parent::__construct();
			
			$this->debugger 	= $GLOBALS['debugger'];
			$this->auth 		= new Auth();
//			$this->translator 	= new XmlTranslator('en');
		}
		
		// public function changeLanguage($lang = 'en')
		// {
			// $this->translator->setLang($lang);
			// $this->goBack();
		// }
		
		public function construction()
		{
			$this->debugger->showConsole 	= FALSE;
			$this->view->entity 			= "error";
			$this->view->template 			= "construction";
			$this->view->render();
			die();
		}
	
		public function error404()
		{
			$this->debugger->showConsole 	= FALSE;
			$this->view->entity 			= "error";
			$this->view->template 			= "error404";
			$this->view->render();
			die();
		}
		
		public function error() 
		{
			$this->debugger->showConsole 	= FALSE;
			$this->view->entity 			= "error";
			$this->view->render();
			die();
		}
	}
?>
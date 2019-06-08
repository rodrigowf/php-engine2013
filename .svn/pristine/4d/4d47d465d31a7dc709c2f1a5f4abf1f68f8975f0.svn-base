<?php

Class UsuariosController extends AppController
{
	public $defaultActionName = 'home';

	public function beforeAction()
	{
		$this->view->render = false;
	}


	public function login()
	{}

	public function home()
	{}

	public function listar()
	{
		$this->set('usuarios', array(
				array('nome' => 'rdrigo')
			));
		$this->set('numCadastrados', 15);

		return null;

		$this->set('usuarios', $this->loadDAO('usuarios')->selectAll());

		$this->loadDAO('usuarios');
		$usu = $this->usuariosDAO->select('id', 6);
		$usu2 = $this->usuariosDAO->select('nome LIKE rodrigo AND id = 8');

		$usu2->nome = 'Rodrigo Werneck';
		$usu2->update();

		$usus = $this->usuariosDAO->selectAll();
		$usus[0]->nome = 'teste';
		$usus[0]->destinos[0]->universidade = 'ufrj';
		$usus[0]->destinos->update; //ou $usus[0]->destinosDAO->update;
		$usus->insert(array(
			array('nome' => 'Rodrigo Werneck', 'email' => 'rodrigowfranco@gmail.com', 'senha' => '123@4'),
			array('nome' => 'Adolfo Rítlen', 'email' => 'picudomatadodejudeux9000@gmail.com', 'senha' => '123@4'),
			array('nome' => 'Matheus vamoLessa', 'email' => 'matheuscomumaconsoantedissoante@gmail.com', 'senha' => '123@4'),
			array('nome' => 'Minha Avó', 'email' => 'tomaluca@ig.tipicoprovedordevelho.com', 'senha' => '123@4'),
		));

		$usus; //testar se é possivel tratar obj como array p indicies numéricos
	}

	public function visualizar($id = null)
	{
		$this->view->parents = 'adm';

		$this->set(array(
			'inputsSize' => 'large',
			'inputsDisabled' => TRUE
		));

		$this->view->template = 'visualizar_inserir';
	}

	public function cadastro()
	{
		$this->view->parents = 'site';

		$this->set(array(
			'inputsSize' => 'xlarge',
			'inputsDisabled' => FALSE
		));

		$this->view->template = 'visualizar_inserir';
	}

	public function alterar()
	{}

	public function busca()
	{
		$this->view->parents = 'site';

	}
	
} //END CLASS

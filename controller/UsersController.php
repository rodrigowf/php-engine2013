<?php

Class UsersController extends AppController
{
	public $defaultActionName = 'home';

    public function home()
    {
        $this->set('nomeUsu', 'fernando');
    }
    public function login()
    {
        $this->auth->login();
        echo "logou";
        die;

        $this->setFormModel(Usuarios);
    }
	
} //END CLASS

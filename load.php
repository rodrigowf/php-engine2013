<?php
	
	mb_internal_encoding("UTF-8");
	
	//Paths definitions
	require_once './paths.php';
	

	/// CARREGA ARQUIVOS DE CONFIGURAÇÃO PADRÃO ===================================================
	
	require_once CONFIG . 'system.php';
	// require_once CONFIG . 'patterns.php';
	
		
	/// CARREGAMENTO DE BIBLIOTECAS BÁSICAS PARA O FUNCIONAMENTO DO SISTEMA =======================

	require_once CORE . 'functions.php';
	require_once CORE . 'autoloads.php';
    require_once CORE . 'Debugger.class.php';


	//Chama o despachante (aqui é aonde ele vai chamar o controller e fazer toda a magia)
	require_once CORE . "Dispatcher.class.php";
	$dispatcher = new Dispatcher();

//END
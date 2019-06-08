<?php
	//require_once(dirname(__FILE__).'/conexao.php');						// Cria a conexão com o Banco de Dados
	require_once(dirname(__FILE__).'/RegrasValidacao.php'); 			// Funções de validação, como notEmpty ou email
	require_once(dirname(__FILE__).'/Validador.php'); 					// Uma classe para validar os dados de uma maneira melhor 
	require_once(dirname(__FILE__).'/phpmailer/class.phpmailer.php'); 	// PHPMailer
	require_once(dirname(__FILE__).'/MailSender.php');					// Classe que manipula o PHPMailer e usa os dados de smtp abaixo para mandar emails
	require_once(dirname(__FILE__).'/funcoes.php');						// Conjunto de funções úteis para serem usadas no site
	require_once(dirname(__FILE__).'/../engine_arquivos/funcoes.php');	// Conjunto de funções para facilitar a validação, o upload e a exclusão de arquivos
	
	//Dados gerais, coloque o nome do projeto e um prefixo para não dar problema nas sessions
	$projeto_nome = '';
	$session_name = md5('EjCM_projeto_session_nome_'.$projeto_nome); // cria um nome gigante e criptografado para garantir a segurança dos dados da session
	
	// Coloque a url principal do projeto, para depois poder ser usada
	$urlRaiz = "http://localhost/";
	
	// Aqui criará uma variável com o caminho físico para o diretório raiz do projeto
	$diretorioRaiz = dirname(__FILE__);
	// Se for no windows vai vir com barra invertida \ , para garantir que funcione sempre uso /
	$diretorioRaiz = str_replace("\\", "/", $diretorioRaiz);
	$diretorioRaiz = str_replace("/engine", "", $diretorioRaiz); // Tiro o engine no final sobrando o diretorio raiz do projeto inteiro
	
	$paginaAtual = curPageURL(); // Pega a página atual no browser
	
	date_default_timezone_set('America/Sao_Paulo'); // Define a nossa timezone, para as funções de data executarem perfeitamente
	
	//Dados SMTP
	$endSMTP   = "smtp.googlemail.com";
	$userSMTP  = "raulbarbosa@ejcm.com.br";
	$from = "raulbarbosa@ejcm.com.br";
	$fromName = $projeto_nome;
	$senhaSMTP = "senha1234";
	$port = 465;
?>
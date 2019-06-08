<?php
class Auth 
{
	//Não tem problema setar essas variáveis aqui, elas serão carregadas depois no contrutor
	public $keys 		= NULL;
	public $logged 		= FALSE;
	public $userLevel 	= NULL;
	public $userId		= NULL;
	
	public $lockFailPage = null;
	
	public $temp_test;	
	
	public function __construct()
	{
		$this->keys 		= &$_SESSION['_ENGINE_AUTH']['_KEYS'];
		$this->logged 		= &$_SESSION['_ENGINE_AUTH']['_LOGGED'];
		$this->userLevel 	= &$_SESSION['_ENGINE_AUTH']['_USER_LEVEL'];
		$this->userId 		= &$_SESSION['_ENGINE_AUTH']['_USER_ID'];
	}
	
	/**
	 * Loga o usuário
	 */
	public function login($userLevel = null, $userId = null)
	{
		$this->logged 		= true;
		$this->userLevel 	= $userLevel;
		$this->userId		= $userId;
	}
	
	/**
	 * Desloga o usuário
	 */
	public function logoff()
	{
		$this->logged = false;
		unset($_SESSION['_ENGINE_AUTH']);
	}
	
	/**
	 * Seta na session o nível do usuário.
	 * Evite usar essa função! sete no login.
	 */
	public function setLevel($userLevel)
	{
		$this->userLevel = $userLevel;
	}
		
	/**
	 * Seta a(s) chave(s) que será(ão) testada(s) no futuro
	 */
	public function setKey($keys)
	{
		//não pode setar keys se não estiver logado!!!
		if( !$this->logged ) 
		{
			trigger_error('Auth: Foi feita uma tentativa de setar keys para um usuário deslogado!', E_USER_NOTICE);
			return false;
		}
		
		if ( is_array($keys) )
		{
			$this->keys = array_merge($this->keys, $keys);
		}
		else 
		{
			$this->keys[] = $keys;
		}
	}
	
	public function setUserId($userId)
	{
		$this->userId = $userId;
	}
	
	public function getUserId()
	{
		return $this->userId;
	}
	
	/**
	 * Pergunta se o usuário está logado
	 * 
	 * @Return Boolean true se estiver, false se não
	 */
	public function isLogged()
	{
		return $this->logged;
	}
	
	/**
	 * Fechadura: 
	 * Testa se a key existe, se não bloqueia
	 * Se não for passada nenhuma key como parâmetro só testa se o usuário está logado.
	 */
	public function lock($key = null, $op = '||')
	{
		if ( !$this->logged || ( $key !== null && !$this->testKey($key, $op) ) )
		{
			if($this->lockFailPage === null)
			{
				error404();
				die;
			}
			else 
			{
				redirect($this->lockFailPage, true);
				die;
			}
		}
		
	}
	
	/**
	 * Bloqueia se o usuário não está logado ou não possui o nível desejado
	 * Evite de travar por level, ao invés disso sete keys para ele e trave por elas.
	 */
	public function levelLock($level)
	{
		$test = false;
		
		foreach ( func_get_args() as $arg )
		{
			if (is_array($arg)) 
			foreach ($arg as $level) 
			{
				$test = ( ( $this->userLevel == $level ) || $test);
			}
			else 
			{
				$test = ( ( $this->userLevel == $arg ) || $test);
			}
		}
		
		if ( !$this->logged || !$test )
		{
			if($this->lockFailPage === null)
			{
				error404();
				die;
			}
			else 
			{
				redirect($this->lockFailPage, true);
				die;
			}
		}
		
	}
	
	/**
	 * Testa se a(s) chave(s) existe(m). retorna true ou false
	 * Case sensitive
	 * 
	 * @param mixed $key palavra única, array de palavras ou string com palavras separadas por vírgula a serem testadas
	 * @param string $op define a operação a ser executada a cada teste no array de entrada (se for array)
	 */
	public function testKey($key, $op = '||')
	{
		//não pode ter keys se não estiver logado!!!
		if( !$this->logged ) return false;
		
		if ( !is_array($key) )
		{
			//chega se uma string com vários valores ====
			
			$key = str_replace(';', ',', $key);
			$key = str_replace(' , ', ',', $key);
			$key = str_replace(', ', ',', $key);
			$key = str_replace(' ,', ',', $key);
			
			$key = explode(',', $key);
			
			if ( !is_array($key) )
			{
				return in_array($key, $this->keys);
			}
		}

		$test = $op == '&&' ? true : false;
		
		foreach($key as $k)
		{
			$temp = in_array($k, $this->keys);
			
			if ( $op == '&&' )
			{
				$test = $test && $temp;
			}
			else 
			{
				$test = $test || $temp;					
			}
		}
		
		return $test;
	}
	
	public function testLevel( $userLevel )
	{
		return $userLevel == $this->userLevel;
	}
}

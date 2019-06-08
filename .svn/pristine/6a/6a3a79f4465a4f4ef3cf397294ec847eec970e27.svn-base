<?php

require_once CONFIG . 'debugger.php';
require_once CORE . 'DebuggerDumper.class.php';

class Debugger {
	
	private $errorLevels = array(E_WARNING => "Warning", E_NOTICE => "Notice", E_USER_ERROR => "User error", E_USER_WARNING => "User warning", E_USER_NOTICE => "User notice", E_RECOVERABLE_ERROR => "Recoverable error");
	private $errorLevelsC = array(E_WARNING => "e_warning", E_NOTICE => "e_notice", E_USER_ERROR => "e_user_error", E_USER_WARNING => "e_user_warning", E_USER_NOTICE => "e_user_notice", E_RECOVERABLE_ERROR => "e_recoverable_error");
	
	private $start_time;
	
	private $consoleShown = FALSE;
	
	private $prints = array();
	private $errors = array();
	private $bts 	= array();
	
	public $showConsole		= SHOW_CONSOLE;
	public $dumpVars		= DUMP_VARS;
	public $dumpBts			= DUMP_BTS;
	
	public $logErrors 		= LOG_ERRORS;
	public $phpLogFile 		= PHP_LOG_FILE;
	public $sysLogFile 		= SYS_LOG_FILE;
	
	public $debugDB 	 	= DEBUG_DB;
	public $displayErrors	= DISPLAY_ERRORS;
	public $displayNotices	= DISPLAY_NOTICES;
	
	public $userInfo = NULL;
	
	public function __construct()
	{
		$this->start_time = microtime(true);

		error_reporting(E_ALL);
		
		ini_set('mysql.trace_mode', 'On');
		
		ini_set('display_errors', 	$this->displayErrors ? 'On' : 'Off');
		ini_set('log_errors', 		$this->logErrors ? 'On' : 'Off');
		ini_set('error_log', 		$this->phpLogFile);
		
	//	$this->showConsole 			= ( $this->errorLevel > 0 );
		
	    set_error_handler(array($this, "errorHandler"));		
	}
	
	public function __destruct()
	{
		/**
		 * Caso o log de erros estiver habilitado faz o log
		 */
		$this->logErrors and $this->logErrors($this->userInfo);
		
		/**
		 * Caso o código tenha fechado, o console possa ser lançado e nada tenha sido impresso
		 */
		if ( !$this->consoleShown && $this->showConsole && !headers_sent() && ( isset($this->prints) || isset($this->bts) || isset($this->errors) ) )
		{
			$this->_die('Execu&ccedil;&atilde;o terminada!');
		}
	}
	
	/**
	 *	Function that will automatically called when an error occur.
	 * 
	 *  Error levels can be:
	 *  
	 * 	E_WARNING 	
	 *	E_NOTICE
	 *	E_USER_ERROR 	
	 *	E_USER_WARNING
	 *	E_USER_NOTICE
	 *	E_RECOVERABLE_ERROR
	 *	E_ALL
	 * 
	 * @param int $level	- error level, can be any one of those above
	 * @param string $message	- user set on error launch
	 * @param string $file 	- where it occurs
	 * @param string $line	- in witch line
	 * @param array $context	- all variables in this context
	 */
	public function errorHandler($level, $message, $file, $line, $context)
	{
		///Minha gambiarra para imprimir todas as variáveis de contexto
		
		if($message == 'vars')
		{
			$print['name'] 				= "Context variables";
			$print['value'] 			= $context;
			$print['caller']['file'] 	= str_replace(APP_ROOT, "./", $file);
			$print['caller']['line'] 	= $line;
			
			$this->prints[] = $print;
			return true;
		}
		
		///============================================================

		$error['level'] 	= $level;
		$error['message'] 	= $message;
		$error['file'] 		= str_replace(APP_ROOT, "./", $file);
		$error['line'] 		= $line;
		$error['context'] 	= $context;
		$error['bt'] 		= $this->_bt(1, "trigger_error"); // Backtracking até a chamada de "trigger_error()"
		
		$this->errors[] = $error;

		if ( $level == E_ERROR || $level == E_USER_ERROR )
		{
			if($this->showConsole)	
			{
				redirect('error', true);
			}
			else 
			{
				$this->_die('Execu&ccedil;&atilde;o interrompida por um erro fatal!');
			}
		}
		
	}
	
	/**
	 *	Backtracking a partir de $offset até um $limiter
	 *	
	 *	@param int    $offset  - a partir de qual chamada se deseja exibir
	 * 	@param string $limiter - nome da função chamada que não se deseja exibir
	 * 	@param int 	  $limiter - remove as últimas $limiter chamadas do backtrace
	 */
	private function _bt($offset = 0, $limit = 0)
	{
		$bt = debug_backtrace();
		
		// Apara as pontas do array ================
		
		// remove primeiras chamadas
		if(is_numeric($offset) && $offset < 100 && $offset > 0) 
		{
			while($offset--)
			{
				array_pop($bt); 
			}
		}
		
		// remove ultimas chamadas ou até a que tenha a função passada como string 
		// ou as $limit últimas chamadas caso $limit seja numérico
		if (is_string($limit)) 
		{
			while ($temp = array_shift($bt)) 
			{
				if ($temp['function'] == $limit) break;
			}
		} 
		elseif (is_numeric($limit) && $limit < 100 && $limit > 0) 
		{
			while ($limit--) { 
				array_shift($bt);
			}
		}
		
		// =========================================
		
		//$bt = array_reverse($bt); //se quiser um retorno ao contrário

		return $bt;
	}
	
	/**
	 * Imprime no console backtrace corretamente formatado entre os limites dados.
	 */
	public function bt($offset = 0, $limit = 0)
	{
		if ( $this->showConsole || $this->dumpBts ) return;
		
		$this->bts['bt'] = $this->_bt($offset, $limit + 2); //esse +2 não deixa chegar até essa função
	}
	
	
	
	/**
	 * adiciona uma entrada direta do usuário ao array que será impresso no console
	 * imprime também as tais informações: de onde foi chamada, etc.
	 */
	public function var_dump($value, $name = null) 
	{
		if( $this->showConsole || $this->dumpVars ) return;
		
		$print['name'] 				= $name;
		$print['value'] 			= $value;
		
		//echo '<pre>'; print_r($this->_bt()); echo '</pre>';
		//$print['caller']['file'] 	= str_replace(APP_ROOT, "./", $file);
		//$print['caller']['line'] 	= $line;
		
		$this->prints[] = $print;
	}
	
	/**
	 * Mata a aplicação mas antes carrega o console (chama smarty, etc)
	 */
	public function _die($msg = 'Execu&ccedil;&atilde;o interrompida!') 
	{
		if ( $this->showConsole ) return;
		
		?>
		<html>
			<head>
				<link rel="stylesheet" href="<?php echo WEB_VIEW; ?>/core/styles/debugConsole.css" type="text/css">
				<script type="text/javascript" src="<?php echo WEB_SCRIPTS; ?>/modules/scripts/libs/jquery-1.7.1.min.js"></script>
				<script type="text/javascript" src="<?php echo WEB_SCRIPTS; ?>/modules/scripts/libs/jquery-ui-1.8.17.custom.min.js"></script>
				<style>*{margin:0px;border:0px}</style>
				<script type="text/javascript" src="<?php echo WEB_SCRIPTS; ?>/core/scripts/debugConsole.js?version=1"></script>
			</head>
			<body>
				<h1><?php echo $msg; ?></h1>
				<div id="engine-debug" style="height:100%">
				<?php $this->printConsole();?>
				</div>
			</body>
		</html>
		<?php
		die();
	}
	
	/**
	 * Add all the errors ocurred into a log file
	 */
	public function logErrors($infos = 'NA')
	{
		
		$file = fopen($this->sysLogFile, 'a');
		$now = date('d/m/y H:i:s');
		
		fwrite($file, 
			"\n[$now][$infos]"
		);
		
		foreach( $this->errors as $erro )
		{
			$level 		= strtoupper($this->errorLevelsC[$erro['level']]);
			$message 	= $erro['message'];
			$origin		= $erro['file'];
			$line 		= $erro['line'];
			$context 	= $erro['context'];
			
			fwrite($file, 
				"\n\t$level - $message CALLED ON $origin LINE $line [backtrace: $backtrace] [context: $context]"
			);
		}
		
		fclose($file);
	}
	
	/**
	 * Print all the contents of array $this->dump in a loop:
	 * errors, debugs, etc.
	 */
	public function printConsole() 
	{
		if ( !$this->showConsole || $this->consoleShown ) return;
		
		$time = microtime(true) - $this->start_time;
		
		?>
		
		<div id="engine-debugConsole">
		<div id="engine-debugConsole-container">
			
			<ul>
				<?php if (!empty($this->prints)): ?>
					<li><a href="#tabs-1">Var Dumps</a></li>
				<?php endif; ?>
		
				<?php if (!empty($this->errors)): ?>
					<li><a href="#tabs-2">Errors (<?php echo sizeof($this->errors) ?>)</a></li>
				<?php endif; ?>
		
				<?php if (!empty($this->bts)): ?>
					<li><a href="#tabs-3">Backtraces</a></li>
				<?php endif; ?>
		
				<span id="title">PHP Debug Console - exec time: <?php echo $time ?></span>
				
			</ul>
			
			<div id="engineConsole-body">
			
			<?php if (!empty($this->prints)): ?>
				<div id="tabs-1">
					<?php
					foreach ($this->prints as $print):
						DebuggerDumper::dump(
							$print['value'], 
							isset($print['name']) 	? $print['name'] 	: "...", 
							isset($print['caller']) ? $print['caller']	: null
						);
					endforeach;
					?>
				</div>
			<?php endif; ?>
			
			
			<?php if (!empty($this->errors)): ?>
				<div id="tabs-2">
					<?php foreach ($this->errors as $erro): ?>
						<div class="errorEntry <?php echo $this->errorLevelsC[$erro['level']] ?>">
							<p><b><?php echo $this->errorLevels[$erro['level']]?>: </b>	
							<?php echo $erro['message'] ?> <b>in</b> <?php echo $erro['file'] ?> : <?php echo $erro['line'] ?> </p>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			
			
			<?php if (!empty($this->bts)): ?>
				<div id="tabs-3">
					<?php foreach ($this->bts as $bt): ?>
						
						<div class="btsListItem">
						<ul>
							
						<?php foreach($bt as $register): //para cada linha do bt:
						
							extract($register);
				
							//foreach tratando dos casos em que $args contém um array (só inprimiria a palavra 'array')
							foreach($args as $i => $v) $args[$i] = (string) $v;
							$strArgs = @implode(", ", $args);
							
							//limpando as exibições de algumas partes das entradas do backtrace
							$strArgs = !in_array($function, array("require_once", "require", "include", "include_once")) ? $strArgs : str_replace(APP_ROOT, "/", $strArgs);
							$file = str_replace(APP_ROOT, "/", $file);
							$file = str_replace('\\', '/', $file)
							?>
							
							<li class="btEntry">
							<?php echo $function ?>(<?php echo $strArgs ?>) called at [<?php echo $file ?> : <?php echo $line ?>]
							</li>
							
						<?php endforeach; ?>
						</ul>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			
			<div id="teste12">
			</div>
			
			</div>
		</div>
		</div>
		
		<?php
		
		$this->consoleShown = TRUE;
	}
}
	
$debugger = new Debugger();

/**
* Alias of {@link $debugger->dump()}
*/
Function debug() 
{
	$args = func_get_args();
	call_user_func_array(array($GLOBALS['debugger'], 'var_dump'), $args);
}

/**
* Alias of {@link $debugger->bt()}
*/
Function bt() 
{
	$GLOBALS['debugger']->bt(0, 0);
}

/**
* Alias of {@link $debugger->_die()}
*/
function kill($msg) 
{
	$GLOBALS['debugger']->_die($msg);	
}

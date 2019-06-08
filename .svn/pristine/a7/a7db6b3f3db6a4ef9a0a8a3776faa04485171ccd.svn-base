<?php
	/*Funções que verificam dados no GET*/

	/**
	 * Checa se foi passado por GET, a uma certa página , um id válido.
	 */ 
	function checa_id_passado()
	{
		if(!empty($_GET))
		{
			if(isset($_GET['id']))
			{
				if (is_numeric($_GET['id']))
				{
					$id = (int)$_GET['id'];
					return ($id >= 0); // O id tem que ser um número positivo
				}
			}
		}	
		return false;
	}
	
	/**
	 * Checa se foi passado por GET, a uma certa página , o parametro com o nome passado
	 * @param $nome_parametro o nome do parametro para checar se foi passado
	 */  
	function checa_param_passado($nome_parametro)
	{
		if(!empty($_GET))
		{
			return isset($_GET[$nome_parametro]);
		}
		return false;
	}
	
	/*Funções de SESSION*/
	
	/**
	 * Essa função impede uma pessoa de ver uma página a não ser que ela esteja logada
	 * @param $pagina a página para redirecionar caso o usuário não esteja logado
	 * @param $nivel o nível para ter permissão de acessar a página ou não, se o nivel da pessoa logado for menor do que o passado, ela não pode ficar nessa página
	 * @return Retorna false se não estava logado e true se estava 
	 */
	function estaLogado($pagina, $nivel = 0)
	{
		// Se a pessoa não está logada redireciona
		if($_SESSION['logado'] != true)
		{
			header("Location: $pagina");
			return false;
		}
		// Se a pessoa não tem nível para acessar a página redireciona
		else if(isset($_SESSION['nivel']))
		{
			if((int)$_SESSION['nivel'] < (int)$nivel)
			{
				header("Location: $pagina");
				return false;
			}
		}
		return true;
	}
	
	/**
	 * Essa função impede uma pessoa de ver uma página a não ser que ela esteja logada como administrador
	 * @param $pagina a página para redirecionar caso o usuário não seja o administrador
	 * @param $nivel_administrador o nível para ser administrador
	 * @return Retorna false se não estava logado como administrador e true se estava
	 */
	function administrador($pagina, $nivel_administrador = 1)
	{
		return estaLogado($pagina, $nivel_administrador);	
	}
	
	/**
	 * Essa função gera o html para mensagens de um tipo passado (usada nas funções abaixo)
	 * @param $tipo coloque erro, sucesso ou info (será usado depois como valor de class da tag, pro css mexer)
	 * @param $mensagem a mensagem
	 * @param $small se o campo deve ser small, o default é false
	 * @param $escrever_na_tela se a mensagem deve aparecer na tela ou simplesmente ser retornada, o default é true
	 */
	function printMensagem($tipo, $mensagem, $small = false, $escrever_na_tela = true) {
		$html = "";
		if(!empty($mensagem) && is_string($mensagem))
		{
			if($small)
			{
				$html = '<small id="msg_'.$tipo.'" class="'.$tipo.'">'. $mensagem. '</small>';
			}
			else
			{
				$label = ucfirst($tipo);
				if($tipo == "info") // Caso especial para uma informação
					$label = "Informação";
				$html = '<div id="msg_'.$tipo.'" class="'.$tipo.'">'.'<strong>'.$label.':</strong><br />'. $mensagem. '</div>';
			}
			// Se tiver autorização para escrever na tela
			if($escrever_na_tela)
				echo $html; //Escreve o html na tela
		}
		
		return $html;
	}
	
	/**
	 * Essa função serve para colocar uma mensagem na SESSION que será usada em imprimeSession()
	 * @param $tipo coloque erro, sucesso ou info (será usado depois como valor de class da tag, pro css mexer)
	 * @param $mensagem é a mensagem que será exibida
	 */
	function colocaMensagemSession($tipo, $mensagem, $area = "")
	{
		$_SESSION['tipo'] = $tipo;
		$_SESSION['msg'.$area] = $mensagem;
	}
	
	/**
	 * Escreve na tela uma mensagem que tenha sido colocada na session (normalmente utilizando a função colocaMensagemSession)
	 * @param $area caso queira fazer as mensagens da session serem separadas em áreas (evita serem imprimidas em lugares indevidos), o default é vazio 
	 * @param $small valerá true se é para exibir a mensagem entre tags small e false se é para exibir em uma div (Valor DEFAULT: false)
	 * @param $escrever_na_tela valerá true se é para exibir na tela a mensagem e false se é apenas para retornar o seu valor (Valor DEFAULT: true)
	 * @return Retorna o html utilizado para exibir o conteúdo
	 */
	function imprimeSession($area = "", $small = false, $escrever_na_tela = true)
	{
		if(isset($_SESSION['msg'.$area]) && isset($_SESSION['tipo']))
		{
			$msg = $_SESSION['msg'.$area];
			$tipo = $_SESSION['tipo'];
			
			$html = printMensagem($tipo, $msg, $small, $escrever_na_tela);
		}
		
		unset($_SESSION['msg'.$area]);
		unset($_SESSION['tipo']);
		
		return $html;
	}
	
	/*Funções Úteis*/
	
	/**
	 * Essa função gera o html para mensagens de erro
	 */
	function printErro($erro, $small = false, $escrever_na_tela = true) {
		return printMensagem("erro", $erro, $small, $escrever_na_tela);
	}
	
	/**
	 * Essa função gera o html para mensagens de sucesso
	 */
	function printSucesso($sucesso, $small = false, $escrever_na_tela = true) {
		return printMensagem("sucesso", $sucesso, $small, $escrever_na_tela);
	}
	/**
	 * Essa função gera o html para mensagens de informação
	 */
	function printInfo($info, $small = false, $escrever_na_tela = true) {
		return printMensagem("info", $info, $small, $escrever_na_tela);
	}
	
	/**
	 * Se o valor de $valor for vazio, escreve a mensagem contida em $mensagem_vazio, caso contrário escreve o valor de $valor
	 * @param $valor o valor que será avaliado se é vazio ou não e que será escrito se não for vazio
	 * @param $mensagem_vazio a mensagem que será escrita se o campo for vazio
	 */
	function printCampoVazio($valor, $mensagem_vazio = "Esse valor não foi preenchido")
	{
		if(notEmpty($valor)){
			echo $valor;
		}
		else{
			echo $mensagem_vazio;
		}
	}
	
	/**
	 * Função que diz se um elemento passado existe em um conjunto de dados (pode ser um array ou uma string)
	 * @param $elemento O valor a ser procurado
	 * @param $conjunto O conjunto de dados, que pode ser um array ou uma string
	 * @return Retornará true se o elemento foi achado e false caso contrário
	 */
	function elemento_existe($elemento, $conjunto)
	{
		if(!isset($elemento) || !isset($elemento)) return false;
		if(is_array($conjunto)) // Se o conjunto for um array
		{
			return in_array($elemento, $conjunto);
		}
		else if(is_string($conjunto)) // Se o conjunto for uma string
		{
			return (strstr($conjunto, $elemento) != false);
		}
		return ($elemento == $conjunto); // Em ultimo caso retornará se um é igual ao outro
	}
	
	/**
	 * Transforma um texto com tags html em plain text ( com \ns e outros elementos que o notepad entenderia )
	 * @param $html
	 */
	function html2text($html)
	{
	    $tags = array (
	    0 => '~<h[123][^>]+>~si',
	    1 => '~<h[456][^>]+>~si',
	    2 => '~<table[^>]+>~si',
	    3 => '~<tr[^>]+>~si',
	    4 => '~<li[^>]+>~si',
	    5 => '~<br[^>]+>~si',
	    6 => '~<p[^>]+>~si',
	    7 => '~<div[^>]+>~si',
	    );
	    $html = preg_replace($tags,"\n",$html);
	    $html = preg_replace('~</t(d|h)>\s*<t(d|h)[^>]+>~si',' - ',$html);
	    $html = preg_replace('~<[^>]+>~s','',$html);
	    // reducing spaces
	    $html = preg_replace('~ +~s',' ',$html);
	    $html = preg_replace('~^\s+~m','',$html);
	    $html = preg_replace('~\s+$~m','',$html);
	    // reducing newlines
	    $html = preg_replace('~\n+~s',"\n",$html);
	    return $html;
	}
	
	/**
	 * Gera um string aleatória 
	*/
	function senhaAleatoria()
	{
		$caracteresAceitos = 'abcdefghijklmnopqrstuvxywzABCDEFGHIJKLMNOPQRSTUXYWZ0123456789$@#';
	
		$max = strlen($caracteresAceitos)-1;
	
		$password = null;
	
		for($i=0; $i < 8; $i++) 
		{
		
			$password .= $caracteresAceitos{mt_rand(0, $max)};
		
		}
		return $password;		
	}
	
	/**
	 * Gera uma cor aleatória
	 */
	function corAleatoria()
	{
	    mt_srand((double)microtime()*1000000);
	    $c = '';
	    while(strlen($c)<6){
	        $c .= sprintf("%02X", mt_rand(0, 255));
	    }
	    return $c;
	}
	
	/**
	 * Verifica se você está na ADM 
	*/
	function paginaAdm(){
		$url = $_SERVER ['REQUEST_URI'];	
		$tokens = explode("/", $url);
		
		return elemento_existe("adm", $tokens);
	}
	
	/**
	 * Pega o nome da página atual
	*/
	function curPageURL() {
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
	}
	
	/**
	 * Get a web file (HTML, XHTML, XML, image, etc.) from a URL.  Return an
	 * array containing the HTTP server response header fields and content.
	 */
	function get_web_page( $url )
	{
	    $options = array(
	        CURLOPT_RETURNTRANSFER => true,     // return web page
	        CURLOPT_HEADER         => false,    // don't return headers
	        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
	        CURLOPT_ENCODING       => "",       // handle all encodings
	        CURLOPT_USERAGENT      => "ejcm", // who am i
	        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
	        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
	        CURLOPT_TIMEOUT        => 120,      // timeout on response
	        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
	    );
	
	    $ch      = curl_init( $url );
	    curl_setopt_array( $ch, $options );
	    $content = curl_exec( $ch );
	    $err     = curl_errno( $ch );
	    $errmsg  = curl_error( $ch );
	    $header  = curl_getinfo( $ch );
	    curl_close( $ch );
	
	    $header['errno']   = $err;
	    $header['errmsg']  = $errmsg;
	    $header['content'] = $content;
	    return $header;
	}
	
	/**
	 * Função que coloca um array na tela de uma maneira formatada, para visualizar melhor o seu conteúdo
	*/
	function imprimeArray($array)
	{
		echo "<pre>";
		print_r($array);
		echo "</pre><br />";
	}
	
	// DETECTA IE
	

	function ae_detect_ie()
	{
	    if (isset($_SERVER['HTTP_USER_AGENT']) && 
	    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
	        return true;
	    else
	        return false;
	}
	
	/*Funções de Data*/
	
	function data_normal($dtData, $mensagem_erro = "Data inexistente")
	{
		$data_exata = substr($dtData, 0, 10); // data do BD: xxxx-xx-xx (10 dígitos)
		$arrayData = explode("-", $data_exata);
		$dia = $arrayData[2];
		$mes = $arrayData[1];
		$ano = $arrayData[0];
		$data_normal = "$dia/$mes/$ano";
		if(data($data_normal)){
			return $data_normal.substr($dtData,10); // Retorna a data com o resto da string passada (que pode conter a hora por exemplo)
		}
		else{
			return $mensagem_erro; // Se não for uma data válida retorna uma mensagem de erro
		}
	}
	
	function data_BD($dtData)
	{
		$data_exata = substr($dtData, 0, 10); // data normal: xx/xx/xxxx (10 dígitos)
		$arrayData = explode("/", $data_exata);
		$dia = $arrayData[0];
		$mes = $arrayData[1];
		$ano = $arrayData[2];

		return "$ano-$mes-$dia".substr($dtData,10); // Retorna a data com o resto da string passada (que pode conter a hora por exemplo)
	}
	
	/**
	 * Adiciona uma quantidade de dias, mês e anos a uma data passada
	 * @param $givendate Data no formato de BD: Y-m-d
	 * @param $day Quantidade de dias a serem adicionados na data atual
	 * @param $mth Quantidade de meses a serem adicionados na data atual
	 * @param $yr Quantidade de anos a serem adicionados na data atual
	 * @param $formato_bd Diz se a data final a ser retornada será no formato do BD: Y-m-d (valor true), ou no formato normal d/m/Y (valor false)
	 * @return Retorna a data no formato do BD
	 */
	function data_adicionar($givendate, $day=0, $mth=0, $yr=0, $formato_bd = false)
	{
		$cd = strtotime($givendate);
		
		$newdate = date('Y-m-d', mktime(date('h',$cd),
		date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
		date('d',$cd)+$day, date('Y',$cd)+$yr));
		
		if(!$formato_bd){
			return data_normal($newdate);
		}
		
		return $newdate; // Já está no formato do BD
	}
	
	/*Acha a primeira segunda da semana de um ano passado como parâmetro*/
	function WeekToDate ($week, $year)
	{
		$Jan1 = mktime (1, 1, 1, 1, 1, $year);
		$iYearFirstWeekNum = (int) strftime("%W",mktime (1, 1, 1, 1, 1, $year));

		if ($iYearFirstWeekNum == 1)
		{
			$week = $week - 1;
		}

		$weekdayJan1 = date ('w', $Jan1);
		$FirstMonday = strtotime(((4-$weekdayJan1)%7-3) . ' days', $Jan1);
		$CurrentMondayTS = strtotime(($week) . ' weeks', $FirstMonday);
		return ($CurrentMondayTS);
	}

	/*Retorna a data completa do primeiro domingo da semana de um ano passado como parâmetro*/
	function data_inicio_semana($semana,$ano){
		$iWeekNum = $semana;
		$iYear = $ano;

		$sStartTS = WeekToDate ($iWeekNum, $iYear);
		$sStartDate = date ("Y-m-d", $sStartTS);
		return add_date($sStartDate,-1,0,0)."<br/>";	
	}
	
	/*Funções para verificar se um campo é único*/
	
	/**
	 * Verifica se um campo passado é único em uma tabela passada
	 * @param $nome_campo o nome do campo na tabela
	 * @param $valor_campo o seu valor
	 * @param tabela para verificar se o campo é único
	 */
	function verifica_campo_unico($nome_campo, $valor_campo, $tabela)
	{
		$query = "SELECT * FROM $tabela WHERE $nome_campo = '$valor_campo'";
		$result	= mysql_query($query);
		$num = mysql_num_rows($result);

		if($num > 0) return true;
		return false;
	}
	
	/**
	 * Verifica se um login passado é único em uma tabela passada
	 * @param $login o valor do login
	 * @param tabela para verificar se o campo é único (Valor Default: usuario)
	 */
	function verifica_login_unico($login, $tabela = 'usuario'){
		return verifica_campo_unico('login', $login, $tabela);
	}
	
	/* Funções de conexão */
	
	// Conecta à base de dados passada por parametro com a codificação padrão utf-8
	$num_rows = 0;
	$result = "";
		
	// Para retornar o resultado da query de INSERT, UPDATE, DELETE
	function modify($sql) 
	{
		GLOBAL $num_rows, $result;
		$result = mysql_query($sql) or die("Query error<br/>".mysql_error());
		$num_rows = mysql_affected_rows();
		return $result;
   }
	   
	// Escolhe a melhor maneira de retornar uma linha de uma tabela, com uma varíavel result e outra falando se as chaves são númericas
	function ret_row($result, $chaves_numericas)
	{
		if($chaves_numericas){
			$row = mysql_fetch_row($result); // As chaves serão números
		}
		else{
			$row = mysql_fetch_assoc($result); // As chaves serão strings
		}
		$chaves = array_keys($row);
		// Se só tiver um resultado retornado, irá retornar apenas esse resultado em vez do array inteiro
		if(count($chaves) == 1){
			$unica_chave_existente = $chaves[0]; // Como só tem uma chave, ela está na posição 0
			return $row[$unica_chave_existente];
		}
		return $row; // Se não tiver apenas um resultado irá retornar a linha inteira
	}
	
	// Para retornar o resultado da query de SELECT e SHOW
	function procura_BD($sql, $unique = false, $chaves_numericas = false)
	{
		GLOBAL $num_rows, $result;
		$result = mysql_query($sql) or die("Query error<br/>".mysql_error());
		$num_rows = mysql_num_rows($result);
		if ($unique == null || $unique == false) {
			if ($num_rows > 0) {
				$rows = array();
				// Para cada linha retornada em $result (o resultSet) coloca no array rows o resultado
				for($i = 0; $i < $num_rows; $i++){
					$rows[] = ret_row($result, $chaves_numericas); // Insere cada linha no final desse array $rows
				}
				return $rows;
			}
		}
		// Se for um resultado só
		else if ($num_rows == 1) {
			return ret_row($result, $chaves_numericas);
		}
		return array(); // Se não executou nada retorna um array vazio
	}
	
   	/**
   	 * Executa uma query no banco
   	 * @param sql a string com o código da query em si
   	 * @param unique se é um único resultado, vale true, se for false é porque é para retornar vários resultados
   	 * @param modify vale true se é uma query de INSERT, UPDATE, DELETE e false se é uma query de SELECT ou SHOW
   	 * @param chaves_numericas significa que usará mysql_fetch_row em vez de mysql_fetch_assoc (para os casos que modify é false)
   	 */
	function executa_query($sql, $unique = false, $modify = false, $chaves_numericas = false)
	{
		if($modify){ // Se for para modificar alguma tabela
			return modify($sql); // Chama a função apropriada para modificar
		}
		// Se não executa a função, que retornará o resultado de uma chamada a uma query de SELECT ou SHOW
		return procura_BD($sql, $unique, $chaves_numericas);
	}
	
?>
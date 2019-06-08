<?php 

/**
 * Redireciona para a pagina $url a partir da pagina principal
 * @param array $url
 */
function redirect($url, $local = false)
{
	if ( $local ) {
		$url = WEB_ROOT . $url;
	}
	header('Location: '.$url);		
	exit;
}

function dbg($var = null)
{
	echo '<pre>'; var_dump($var); echo '</pre>';
	die('execução interrompida.');
}

/**
 * Redireciona para a página de 404
 */
function error404()
{
	//call_user_func(array('this', 'error404'));
	redirect('error404', true);
}

/**
 * Converte qualquer decimal para a base cujos algarismos estão esplicitados no segundo parametro
 * 
 * @see decToBase()
 */
function hexTo62($hex)
{
	$base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	return hexToBase($hex, $base);
}

/**
 * Converte qualquer decimal para a base cujos algarismos estão esplicitados no segundo parametro
 * 
 * @see decToBase()
 */
function hexToBase($hex, $base)
{
	return decToBase(hexdec($hex), $base);
}

/**
 * Converte qualquer decimal para a base cujos algarismos estão esplicitados no segundo parametro
 * 
 * @param Mix $dec Número decimal à ser convertido
 * @param String $base sequencia de caracteres que representam algarismos da base
 */
function decToBase($input, $base)
{
	$tam = strlen($base);
	$output = '';
	
	while($input > $tam - 1)
	{
		$output   = $base[fmod($input, $tam)] . $output;
		$input = floor( $input / $tam );
	}
	$output = $base[$input] . $output;
	
	return $output;
} 

/**
 * Gera um id único e curto com os caracteres: 0-9/a-z/A-Z
 * 
 * @param Int $prefixLen Número de caracteres que terá o prefixo gerado aleatoriamente
 * 
 * @return retorna um número aleatório com quase sempre ( 9 + $prefixLen ) caracteres
 */
function uuidGen($prefixLen = 2)
{
	$base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$maxRand = pow(strlen($base), $prefixLen);
	$rand = dechex(rand(0, $maxRand));
	$rand = str_pad($rand, strlen(dechex($maxRand)), "0", STR_PAD_BOTH);
	$dec = hexdec(uniqid($rand));
	return decToBase($dec, $base);
}

/**
 * Recursively strips slashes from all values in an array
 *
 * @param array $values Array of values to strip slashes
 * @return mixed What is returned from calling stripslashes
 * @link http://book.cakephp.org/view/1138/stripslashes_deep
 */
function stripslashes_deep($values) {
	if (is_array($values)) {
		foreach ($values as $key => $value) {
			$values[$key] = stripslashes_deep($value);
		}
	} else {
		$values = stripslashes($values);
	}
	return $values;
}

/**
 * Recursively put slashes in all values in an array
 * @param array &$values = $_POST, $_GET, $_COOKIE, etc 
 */
function escapestring_deep($values){
	if(is_array($values)){
		foreach($values as $key => $value){
			$values[$key] = escapestring_deep($value);
		}
	} else {
		if(!isnumeric($value)){
			$values = get_magic_quotes_gpc() ? mysql_real_escape_string(stripslashes($values)) : mysql_real_escape_string($values);
		}
	}
	return $values;
}

function getBrowser() {
	$var = $_SERVER['HTTP_USER_AGENT'];
	$info['browser'] = "OTHER";
    
	// valid brosers array
	$browser = array ("MSIE", "OPERA", "FIREFOX", "MOZILLA",
	                  "NETSCAPE", "SAFARI", "LYNX", "KONQUEROR");
	
	// bots = ignore
	$bots = array('GOOGLEBOT', 'MSNBOT', 'SLURP');
	
	foreach ($bots as $bot)
	{
	    // if bot, returns OTHER
	    if (strpos(strtoupper($var), $bot) !== FALSE)
	    {
	        return $info;
	    }
	}
    
	// loop the valid browserss
	foreach ($browser as $parent)
	{
	    $s = strpos(strtoupper($var), $parent);
	    $f = $s + strlen($parent);
	    $version = substr($var, $f, 5);
	    $version = preg_replace('/[^0-9,.]/','',$version);
	    if (strpos(strtoupper($var), $parent) !== FALSE)
	    {
	        $info['browser'] = $parent;
	        $info['version'] = $version;
	        return $info;
	    }
	}
	return $info;
}

/**
 * Searches include path for files.
 *
 * @param string $file File to look for
 * @return Full path to file if exists, otherwise false
 * @link http://book.cakephp.org/view/1131/fileExistsInPath
 */
function fileExistsInPath($file) {
	$paths = explode(PATH_SEPARATOR, ini_get('include_path'));
	foreach ($paths as $path) {
		$fullPath = $path . DS . $file;

		if (file_exists($fullPath)) {
			return $fullPath;
		} elseif (file_exists($file)) {
			return $file;
		}
	}
	return false;
}

/**
 * Implements http_build_query for PHP4.
 *
 * @param string $data Data to set in query string
 * @param string $prefix If numeric indices, prepend this to index for elements in base array.
 * @param string $argSep String used to separate arguments
 * @param string $baseKey Base key
 * @return string URL encoded query string
 * @see http://php.net/http_build_query
 * @deprecated Will be removed in 2.0
 */
if (!function_exists('http_build_query')) {
	function http_build_query($data, $prefix = null, $argSep = null, $baseKey = null) {
		if (empty($argSep)) {
			$argSep = ini_get('arg_separator.output');
		}
		if (is_object($data)) {
			$data = get_object_vars($data);
		}
		$out = array();

		foreach ((array)$data as $key => $v) {
			if (is_numeric($key) && !empty($prefix)) {
				$key = $prefix . $key;
			}
			$key = urlencode($key);

			if (!empty($baseKey)) {
				$key = $baseKey . '[' . $key . ']';
			}

			if (is_array($v) || is_object($v)) {
				$out[] = http_build_query($v, $prefix, $argSep, $key);
			} else {
				$out[] = $key . '=' . urlencode($v);
			}
		}
		return implode($argSep, $out);
	}
}

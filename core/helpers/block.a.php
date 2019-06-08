<?php
/*
 * Smarty plugin
 * *feito pelo werneck
 * -------------------------------------------------------------
 * File:     block.a.php
 * Type:     function
 * Name:     a
 * Purpose:  anchor helper
 * -------------------------------------------------------------
 */

/**
 * @param $params
 * @param $content
 * @param View $view
 * @return string
 */
function smarty_block_a($params, $content, &$view)
{
	static $output;

	if (isset($content)) 
	{
    	$output .= "$content</a>";
		return $output;
	}

	//DEFINE O DESTINO =====================================

	if( isset($params['a']) )
	{
		$action = $params['a'];
		if ($action == $view->controller->defaultActionName)
		{
			$action = NULL;
		}
		unset($params['a']);
	} 
	else 
	{
		$action = NULL;
	}
				
	if( !isset($params['c']) )
	{
		$controller = $view->controller->name;
		
	}
	else
	{
		$controller = $params['c'];
		unset($params['c']);
	}
	
	if ($controller == $view->controller->defaultControllerName)
	{
		$controller = NULL;
	}

	$actionParameters = NULL;
	
	if ( isset($params['p']) )
	{
		$actionParameters = is_array($params['p']) ? implode('/', $params['p']) : (string) $params['p'];
		unset($params['p']);

		//TODO limpar parametros!
        // $parameters = str_replace('%', '@', str_replace('.', '%2e', urlencode($parameters)));
	}

	// MONTA OS ARGUMENTOS

	if ( isset($params['href']) )
	{
		trigger_error("Template error: Parametro href passado para o anchor do smarty!", E_USER_NOTICE);
		unset($params['href']);
	}

	if($view->testLinkActivityState($action, $controller))
	{
		if ( isset($params['class']) && is_array($params['class']) )
		{
			$classes = explode($params['class'], ' ');
			$classes[] = 'active';
			$params['class'] = implode(' ', $classes);
		}

		else $params['class'] = 'active';

	}


	$url  =  WEB_ROOT;
	$url .= is_string($controller)		? "$controller/" 	: '';
	$url .= is_string($action) 			? "$action/" 		: '';
	$url .= is_string($actionParameters)	 	? "$actionParameters/" 	: '';
	
	$params['href'] = $url;
	
	//COMEÇA A IMPRIMIR:
	
	$output = "";
	
	//os parametros inúteis até então passam direto para o processamento direto para a tag
	$output .= '<a';
	foreach($params as $name => $value){
		$output .= " $name='$value'";
	}
	$output .= '>';

}
?>
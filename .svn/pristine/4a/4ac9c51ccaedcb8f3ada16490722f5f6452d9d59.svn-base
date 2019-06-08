<?php
/**
 * Smarty plugin
 * *feito pelo Werneck
 * -------------------------------------------------------------
 * File:     function.js.php
 * Type:     function
 * Name:     js
 * Purpose:  script helper
 * -------------------------------------------------------------
 */
function smarty_function_script($params, &$view)
{
	if ( !empty($params['file']) ) 
	{
		$file = $params['file'];
		$file = str_replace(".js", '', $file) . ".js";
		
		if ( !file_exists( APP_SCRIPTS . $file ) )
		{
			trigger_error("<b>Template error:</b> uneable to locate " . APP_SCRIPTS . $file, E_USER_WARNING);
			return false;
		}
		
		$url = $view->scripts_root."$file";
	}
	elseif( !empty($params['url']) )
	{
		$url = $params['url'];
	}
	else 
	{
		trigger_error("<b>template error:</b> js assign - missing 'file' or 'url' parameter", E_USER_WARNING);
		return false;
	}
	
	return "<script type='text/javascript' src='$url'></script>\n";
}
?>
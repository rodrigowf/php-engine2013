<?php
/*
 * Smarty plugin
 * *feito pelo werneck
 * -------------------------------------------------------------
 * File:     function.css.php
 * Type:     function
 * Name:     css
 * Purpose:  css helper
 * -------------------------------------------------------------
 */
function smarty_function_style($params, &$view)
{
	if (!empty($params['file'])) {
	
		$cssRoot 	= $view->styles_root;
		$filename = $params['file'];
		
		$filename = str_replace(array('.less', '.css'), '', $filename);
		
		$path = $cssRoot . $filename;

		if ( file_exists(WEB_STYLES . "$filename.less") )
		{
			$path = "$path.less";
			return "<link rel='stylesheet' type='text/less' href='$path' />";
		}
		elseif ( file_exists(WEB_STYLES . "$filename.css") )
		{
			$path = "$path.css";
			return "<link rel='stylesheet' type='text/css' href='$path' />";
		}
		else
		{
			trigger_error("assign: invalid 'file' parameter: uneable to locate $path");
			return;
		}
	} 
	else if (!empty($params['url'])) {
		$path = $params['url'];
		return "<link rel='stylesheet' type='text/css' href='$path' />";
	}
	else {
		trigger_error("assign: missing 'file' or 'url' parameter");
		return;
	}
	
}
?>
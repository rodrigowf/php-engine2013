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
function smarty_block_lang($params, $content, &$view)
{
	if (isset($content)) 
	{
		$translator = $view->controller->translator;
		
		foreach($params as $key => $value) { 
			$params["%$key"] = $value; 
			unset($params[$key]);
		}
		
		return $translator->translate($content, $params);
	}
}
?>
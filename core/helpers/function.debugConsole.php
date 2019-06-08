<?php
/**
 * Smarty plugin
 * *feito pelo Werneck
 * -------------------------------------------------------------
 * File:     function.debugConsole.php
 * Type:     function
 * Name:     debugConsole
 * Purpose:  print the php debug console
 * -------------------------------------------------------------
 */
function smarty_function_debugConsole($params, &$view)
{
	$view->controller->debugger->printConsole();
	return null;
}
?>
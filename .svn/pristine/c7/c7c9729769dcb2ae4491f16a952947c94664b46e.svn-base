<?php
/*
 * Smarty plugin
 * *feito pelo Werneck
 * -------------------------------------------------------------
 * File:     block.lock.php
 * Type:     block
 * Name:     lock
 * Purpose:  lock helper que omite parte do código se não for autorizado
 * -------------------------------------------------------------
 */
function smarty_block_unlocked($params, $content, &$view)
{
	static $liberado;
	
	//aqui é chamado quando fecha o bloco
    if (isset($content))
    {
    	if($liberado) {
	        return $content;
    	} else {
    		return null;
    	}
    }
	else 
	{		
		$auth = $view->controller->auth;
		$liberado = !$auth->logged;
	}
}

?>
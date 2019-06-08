<?php
/*
 * Smarty plugin
 * *feito pelo werneck
 * -------------------------------------------------------------
 * File:     function.script_autoload.php
 * Type:     function
 * Name:     script_autoload
 * Purpose:  automaticaly load scripts associated with the current page
 * -------------------------------------------------------------
 */
function smarty_function_script_autoload($params, &$view)
{
	$tplFile	= $view->template;

	$virtualPath = $view->getPath('scripts', 'this', 'this', TRUE);
	$physicalPath = $view->getPath('scripts', 'this', 'this', FALSE);

	if ( file_exists("$physicalPath/$tplFile.js") )
	{
		$path = "$virtualPath/$tplFile.js";
		return "<script type='text/javascript' src='$path'></script>\n";
	}
	else
	{
		trigger_error("Não existe um sctipt específico para a página atual: '$physicalPath/$tplFile.less'", E_USER_NOTICE);
	}

	//vê quem deve ser carregado em caso de o css específico não existir
	if ( !isset($params['default']) )
	{
		trigger_error('Não tem nenhum script associado à pagina para carregamento automático', E_USER_NOTICE);
		return;
	}

	//TODO alterar para que o nome seja chado sozinho (pela classe view)

	$default = str_replace(array('.js'), '', $params['default']);

	$virtualPath = $view->getPath('styles', null, 'this', TRUE);
	$physicalPath = $view->getPath('styles', null, 'this', FALSE);

	//carreega o css default que foi definido anteriormente
	if ( file_exists("$physicalPath/$default.js") )
	{
		$path = "$virtualPath/$default.js";
		return "<script type='text/javascript' src='$path'></script>\n";
	}
	else
	{
		trigger_error("A folha de estilos definida como default não existe! '$tplFile'", E_USER_WARNING);
		return;
	}
}
?>
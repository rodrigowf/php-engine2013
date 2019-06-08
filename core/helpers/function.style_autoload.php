<?php
/*
 * Smarty plugin
 * *feito pelo werneck
 * -------------------------------------------------------------
 * File:     function.style_autoload.php
 * Type:     function
 * Name:     style_autoload
 * Purpose:  automaticaly load styles associated with the current page
 * -------------------------------------------------------------
 */
/**
 * @param Array $params Parametros passados para a tag smarty
 * @param View $view
 * @return string Valor que será impresso no lugar da chamada da função
 */
function smarty_function_style_autoload($params, &$view)
{
	$tplFile	= $view->template;

	$virtualPath = $view->getPath('styles', 'this', 'this', TRUE);
	$physicalPath = $view->getPath('styles', 'this', 'this', FALSE);

	if ( file_exists("$physicalPath/$tplFile.less") )
	{
		$path = "$virtualPath/$tplFile.less";
		return "<link rel='stylesheet' type='text/less' href='$path' />";
	}
	else if ( file_exists("$physicalPath/$tplFile.css") )
	{
		$path = "$virtualPath/$tplFile.css";
		return "<link rel='stylesheet' type='text/css' href='$path' />";
	}
	else
	{
		trigger_error("Não existe uma folha de estilos específica para a página atual: '$physicalPath/$tplFile.less' not found!", E_USER_NOTICE);
	}

	//vê quem deve ser carregado em caso de o css específico não existir
	if ( !isset($params['default']) )
	{
		trigger_error('Não tem nenhum arquivo de estilo associado à pagina para carregamento automático', E_USER_NOTICE);
		return;
	}

	//TODO alterar para que o nome do default seja achado sozinho (pela classe view)

	$default = $params['default'];
	strpos($default, '.less') ? $format = 'less' : strpos($default, '.css') ? $format = 'css' : $format = null;
	$default = str_replace(array('.less', '.css'), '', $default);

	$virtualPath = $view->getPath('styles', null, 'this', TRUE);
	$physicalPath = $view->getPath('styles', null, 'this', FALSE);

	//carreega o css default que foi definido anteriormente - testa se já tem extensão definida, senão testa com as duas padrão
	if( $format && file_exists("$physicalPath/$default.$format") )
	{
		$path = "$virtualPath/$default.$format";
		return "<link rel='stylesheet' type='text/less' href='$path' />";
	}
	else if ( file_exists("$physicalPath/$default.less") )
	{
		$path = "$virtualPath/$default.less";
		return "<link rel='stylesheet' type='text/less' href='$path' />";
	}
	else if ( file_exists("$physicalPath/$default.css") )
	{
		$path = "$virtualPath/$default.css";
		return "<link rel='stylesheet' type='text/css' href='$path' />";
	}
	else
	{
		trigger_error("A folha de estilos definida como default não existe: '$physicalPath/$default.$format' not found!", E_USER_WARNING);
		return;
	}
}
?>
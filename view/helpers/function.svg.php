<?php
/*
 * Smarty plugin
 * *feito pelo werneck
 * -------------------------------------------------------------
 * File:     function.svg.php
 * Type:     function
 * Name:     svg
 * Purpose:  svg helper - display an svg image with the svgweb script
 * -------------------------------------------------------------
 */
function smarty_function_svg($params, &$view)
{
	if (!empty($params['file'])) {
	
		$cssRoot 	= $view->styles_root;
		$imageRoot	= WEB_ROOT . "images";
		
		$filename = $params['file'];
		unset($params['file']);
				
		if ( file_exists(APP_ROOT . "images/$filename") )
		{
			$path = "$imageRoot/$filename";
		}
		elseif ( file_exists(APP_STYLES . "images/$filename") )
		{
			$path = "$cssRoot/images/$filename";
		}
		else
		{
			debug(APP_STYLES . "$filename", "destino");
			debug(file_exists(APP_STYLES . "$filename"), "teste");
			trigger_error("assign: invalid 'file' parameter: uneable to locate $filename");
			return null;
		}
	}
	else if ( !empty($params['url']) )
	{
		$path = $params['url'];
		unset($params['url']);
	} 
	else {
		trigger_error("Template Error: function svg called without a 'file' or 'url' attribute!");
		return;
	}
	
	//Passa os parametros inúteis para o processamento direto para a tag
	$attrs  = '';
	foreach($params as $name => $value){
		$attrs .= " $name='$value'";
	}
	
	//$path = "http://localhost/jewc2012/css/background.svg";
	
	$output = 
	"
	<!--[if !IE]>-->
		<object data='$path' type='image/svg+xml' $attrs > <!--<![endif]-->
	<!--[if lt IE 9]>
		<object src='$path' classid='image/svg+xml' $attrs > <![endif]-->
	<!--[if gte IE 9]>
		<object data='$path' type='image/svg+xml' $attrs > <![endif]-->
		</object>
	";
	
	return $output;
}
?>
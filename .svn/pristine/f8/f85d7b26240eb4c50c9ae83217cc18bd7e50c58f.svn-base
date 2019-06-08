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
function smarty_function_switchLocale($params, &$view)
{
	$translator = $view->controller->translator;
	$currentLang = $translator->getLang();
	
	if ( $currentLang == 'en' )
	{
		$adress = WEB_ROOT . 'changeLanguage/pt-br';
		return "<a href='$adress' class='locale pt-br'>Português</a>";
	}
	else 
	{
		$adress = WEB_ROOT . 'changeLanguage/en';
		return "<a href='$adress' class='locale en'>English</a>";
	}
}
?>
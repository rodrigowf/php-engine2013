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

require_once 'simple_html_dom.php';

//Cuidado com o quão grande sua página vai ficar, isso deixa bem mais pesado 
function smarty_block_translatePage($params, $content, &$view)
{
	if ( isset($content) ) 
	{
		$translator = $view->controller->translator;
		
		//elementos que serão traduzidos separados por vírgula
		$busca = 'p, span, label, legend, option, a, button, small, big, b, h1, h2, h3, h4, h5';

		$content = str_get_html($content);
		
		foreach ( $content->find($busca) as $element )
		{
			if ( $element->plaintext == $element->innertext)
			{
				$element->innertext = $translator->translate(trim($element->innertext), array('%br' => '<br />'));
			}
		}
		
		return $content->innertext;
	}
}
?>
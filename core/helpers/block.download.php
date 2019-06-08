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
function smarty_block_download($params, $content, &$view)
{
	static $output;

	if (isset($content)) 
	{
    	$output .= "$content</a>";
		return $output;
	}
	
	if( !isset($params['code']) ) 
		trigger_error('Template Error: Link de download declarado sem o código do arquivo!', E_USER_WARNING);
	else 
	{		
		$fileCode = $params['code'];		
		unset($params['code']);
		
		$temp = explode('?', $fileCode);
		$code1 = $temp[0];
		$code2 = $temp[1];
		
		$params['href'] = WEB_ROOT.'download/'.
		str_replace('%', '@', str_replace('.', '%2e', urlencode($code1))).'/'. 
		str_replace('%', '@', str_replace('.', '%2e', urlencode($code2)));
	}
	
	//COMEÇA A IMPRIMIR:
	
	$output = "";
	
	//Passa os parametros inúteis para o processamento direto para a tag
	$output .= '<a';
	foreach($params as $name => $value){
		$output .= " $name='$value'";
	}
	$output .= '>';

}
?>
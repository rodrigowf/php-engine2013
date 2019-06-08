<?php
/*
 * Smarty plugin
 * *feito pelo Werneck
 * -------------------------------------------------------------
 * File:     block.form.php
 * Type:     block
 * Name:     form
 * Purpose:  form helper
 * -------------------------------------------------------------
 */
function smarty_block_form($params, $content, &$view)
{	
	//OBS: se o nome do modelo que o cara colocou como parametro não existir testar para não dar merda!!
	
	//QUANDO FECHA O BLOCO:
	
    if ( isset($content) ) 
    {
    	//seta automaticamente alguns parâmetros
	
		if ( !isset($params['method']) )
		{
			$params['method'] = 'post';
		}
		if ( !isset($params['action']) )
		{
			$params['action'] = '#';
		}
		if ( strstr($content, 'type="file"') || strstr($content, "type='file'") )
		{
			$params['enctype'] = 'multipart/form-data';
		}
		
		//Passa os parametros inúteis para o processamento direto para a tag
		$output  = '<form';
		foreach($params as $name => $value){
			$output .= " $name='$value'";
		}
		$output .= '>';
		
		//joga os inputs na saida
    	$output .= $content;
		
		//Coloca o submit automaticamente (caso queira)

		//condições para que não seja impresso
		if ( isset($params['submit']) && is_string($params['submit']) && !empty($params['submit']) )
		{
            $submitValue = $params['submit'];
			unset($params['submit']);
            $output .= "<input type='submit' value='$submitValue'>\n";
		}
		
		$output .= "</form>";
		
		$view->unsetTemp('form_modelName'); //unseta essa variavel temporária (nome do modelo)
       
		return $output;
    }
	
	
	//QUANDO ABRE O BLOCO:
	
	//passa o nome do modelo para o input

	if ( isset($params['model']) ) 
	{
		$view->setTemp('form_modelName', array($params['model']));
		unset($params['model']);
	} 
	else 
	{
        $modelName = $view->controller->defaultModelName ? $view->controller->defaultModelName : $view->controller->name;
	    $view->setTemp('form_modelName', array($modelName));
	}
}

?>
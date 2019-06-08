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
/**
 * @param $params
 * @param $content
 * @param View $view
 * @return string
 */
function smarty_block_form($params, $content, &$view)
{	
	//OBS: se o nome do modelo que o cara colocou como parametro não existir testar para não dar merda!!
	
	//QUANDO FECHA O BLOCO:
	
    if ( isset($content) ) 
    {
		//Passa os parametros inúteis para o processamento direto para a tag
		$output  = '<fieldset';
		foreach($params as $name => $value){
			$output .= " $name='$value'";
		}
		$output .= '>';
    	$output .= $content; //joga os inputs na saida
		$output .= '</fieldset>';

        $modelArr = $view->getTemp('form_modelName');
        array_shift($modelArr);
        $view->unsetTemp('form_modelName');
        $view->setTemp('form_modelName', $modelArr); //unseta essa variavel temporária (nome do modelo)

		return $output;
    }
	
	
	//QUANDO ABRE O BLOCO:
	
	//passa o nome do modelo para o input

	if ( isset($params['model']) ) 
	{
        $modelArr = $view->getTemp('form_modelName');
        if ( substr($params['model'], 0, 1) == '/' ) $params['model'] = $modelArr[0].$params['model'];
        array_unshift($modelArr, $params['model']);

        $view->unsetTemp('form_modelName');
		$view->setTemp('form_modelName', $modelArr);
		unset($params['model']);
	}
}

?>
<?php
/*
 * Smarty plugin
 * *feito pelo Werneck
 * -------------------------------------------------------------
 * File:     function.input.php
 * Type:     function
 * Name:     input
 * Purpose:  input helper
 * -------------------------------------------------------------
 */
/**
 * @param $params
 * @param View $view
 * @return string
 */
function smarty_function_input($params, &$view)
{
    function print_label(&$params)
    {
        if ( isset($params['label']) )
        {
            $id     = $params['id'];
            $text	= $params['label'];

            unset($params['label']);

            return "\n<label id='$id"."_label' for='$id'>$text</label>\n";
        }
    }

    function print_input($params)
    {
        $attr = retrieve_attributes($params);
        return "<input $attr>";
    }

    function print_textarea($params)
    {
        $value = $params['value'];
        unset($params['value']);
        unset($params['type']);
        $attr = retrieve_attributes($params);

        return "<textarea $attr>$value</textarea>";
    }

    /**
     * @param $params
     * @param Model $formModel
     * @param $fieldName
     */
    function print_select($params, $formModel, $fieldName)
    {
        $values = $formModel->get_values($fieldName);
        $options = '';

        foreach ($values as $index => $value)
        {
            $disabled = null;
            $selected = null;

            if ( $index == 'disabled' ) $disabled = 'disabled="disabled"';
            if ( $params['value'] == $value ) $selected = 'selected="selected"';

            $optionName = $params[$value];
            unset($params[$value]);

            $options .= "<option value=$value $selected $disabled>$optionName</option>\n";
        }

        unset($params['value']);
        $attr = retrieve_attributes($params);

        return "<select $attr>\n$options</select>";
    }

    function print_radio_check($params, $formModel, $fieldName)
    {
        if ( isset($formModel) && isset($formModel->$fieldName) && $params['value'] == $formModel->$fieldName)
        {
            $params['checked'] = 'checked';
        }

        $attr = retrieve_attributes($params);
        return "<input $attr>";
    }


    function retrieve_attributes($params)
    {
        $attr = '';

        foreach($params as $name => $value){
            $attr .= " $name='$value'";
        }

        return $attr;
    }

    /** @var Model $model  */
    $model = null;

    $modelName = NULL;

    if ( isset($params['model']) )
    {
        $modelName = $params['model'];
        unset($params['model']);
    }
    else
    {
        $modelArr = $view->getTemp('form_modelName');
        $modelName = $modelArr[0];
    }

	//OBS: se o nome do modelo que o cara colocou como parametro não existir testar para não dar merda!!

	//AJEITA ALGUNS PARAMETROS:

	if ( !isset($params['name']) ) trigger_error('não foi setado o atributo name para um dos inputs!', E_USER_ERROR);

    $fieldName = $params['name'];

    //Define um name e um id
    if( !isset($modelName) || $modelName === NULL)
    {
        //caso em que não tem um modelo setado
        $params['name'] = "data[$fieldName]";
        isset($params['id']) or $params['id'] = "input-$fieldName";
    }
    else
    {
        //caso em que tem um modelo setado
        isset($params['id']) or $params['id'] = "input-$modelName-$fieldName";

        $modelName = str_replace('/', '][', $modelName);
        $params['name']	= "data[$modelName][$fieldName]";
    }

    //Tratamento do value (para caso em que a validação falhou ou o caso é de update)

    /** @var Model $formModel  */
    $formModel = isset($view->controller->formModels[$modelName])
        ? $view->controller->formModels[$modelName]
        : NULL;

    if ( !isset($params['value']) && isset($formModel) && isset($formModel->$fieldName) )
    {
        $params['value'] = $formModel->$fieldName;
    }

    //Tratamento do type
    if ( !isset($params['type']) )
    {
        if ( isset($formModel) )
        {
            $params['type'] = $formModel->get_type($params['name']);
        }
        else
        {
            $params['type'] = 'text';
        }
    }

    //Tratamento da classe
    if ( isset($params['class']) )
    {
        $params['class'] .= ' '.$formModel->get_class($params['name']);
    }
    else
    {
        $params['class'] = $formModel->get_class($params['name']);
    }



    //COMEÇA A IMPRIMIR:
	
	$output = '';
	
	//IMPRIME O LABEL caso esteja setado nos parametros
	$output .= print_label($params);

    switch ( $params['type'] )
    {
        case 'textarea':
            $output .= print_textarea($params);
            break;
        case 'select':
            $output .= print_select($params, $formModel, $fieldName);
            break;
        case 'radio':
            $output .= print_radio_check($params, $formModel, $fieldName);
            break;
        case 'checkbox':
            $output .= print_radio_check($params, $formModel, $fieldName);
            break;
        default:
            $output .= print_input($params);
    }
	
	return $output;
}

?>
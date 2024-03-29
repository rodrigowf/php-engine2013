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
 * @usage {val_errors name='email'}
 *
 * @param $params 'name', 'model'(optional), 'separator'(optional), [errorType (message seted on error)]=[replacing message](optional)
 * @param View $view
 */
function smarty_function_val_error($params, &$view)
{
    /** @var Model $model  */
    $model = null;

    /** @var $separator Palavra que vai separar cada uma das mensagens de erro */
    $separator = 'e';

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

    if ( isset($view->controller->formModels[$view->controller->name]) )
    {
        $model =  $view->controller->formModels[$modelName];
    }
    else
    {
        trigger_error("form model not defined for val_error of $modelName model");
    }


    if ( isset($params['separator']) )
    {
        $separator = $params['separator'];
        unset($params['separator']);
    }

    $atribute = $params['name'];
    unset($params['name']);

    $errors = $model->errors->on($atribute);

    if ( is_array($errors) && count($errors) > 0 )
    {
        foreach ( $errors as $key => $error )
        {
            $errors[$key] = isset($params[$error]) ? $params[$error] : $error;
        }

        return implode(' '.$separator.' ', $errors);
    }
}

?>
<?php
/**
* @name Validacao: uma classe para  validar campos
* @author Rodrigo Werneck
* @version 1.0
* @property mixed results
 *
 * Validações possíveis até então:
*/

/**
 * rules
 * not_empty
 * is_numeric
 * is_email
 * is_checked
 */

class Validator {

    static $instance = NULL;

    static function getInstance()
    {
        return  self::$instance
                ? self::$instance
                : self::$instance = new Validator();
    }

    /**
     * Trigger da validação
     *
     * @param field $value
     * @param field $rules
     * @return array $errors
     */
    public function validate($value, $rules)
    {
        $errors = array();

        $canBeEmpty = true;
        $isEmpty = !$this->required($value);

        foreach ( $rules as $key => $rule )
        {
            $params = explode('_', $rule);
            $rule = array_shift($params);

            if ( $rule == 'required' )
            {
                $canBeEmpty = false;
            }

            if ( method_exists($this, $rule) )
            {
                if ( $params )
                {
                    call_user_func_array(array($this, $rule), array_unshift($params, $value));
                }
                else
                {
                    call_user_func(array($this, $rule), $value);
                }
            }
            else
            {
                trigger_error("Validation method $rule doesn exist!", E_USER_NOTICE);
            }
        }

        if ( $canBeEmpty && $isEmpty ) $errors = array('notempty');

        return $errors;

    }

    // The functions below define the rules! ===============================================================

    /**
     * Checa se o valor esta vazio.
     *
     * @param null $field
     * @return boolean TRUE if its not empty, FALSE if it is
     */
    private function required($field = null)
    {
        return ( isset($field) && !empty($field) && ( strlen(trim($field)) > 0 ) );
    }
    
    /**
     * Checa se o campo é numérico
     *
     * @param null $field
     * @return boolean
     */
    private function numeric($field = null)
    {
        return (is_numeric($field));
    }
    
    /**
     * Checa se é email válido
     *
     * @param null $field
     * @return boolean
     */
    private function email($field)
    {
        return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $field);
    }

    private function tel($field)
    {
        return true;
    }

    private function maxlenght($field, $size)
    {
        return ( strlen($field) <= $size );
    }

    private function minlenght($field, $size)
    {
        return ( strlen($field) >= $size );
    }

    private function lenght($field, $size)
    {
        return ( srtlen($field) == $size );
    }

    private function in($field)
    {
        $values = func_get_args();
        array_shift($values);

        return in_array($field, $values);
    }

    private function datetime($field, $size)
    {
        return true;
    }

    /**
     * For file validation (TODO see how to make this without $_FILES)
     *
     * @param $field
     * @param $size
     */
    private function maxsize($field, $size)
    {

    }

    /**
     * Para ver se o valor esta 'checked'
     *
     * @param null $field
     * @return boolean
     */
    private function checked($field = null) {
        return (!is_null($field));
    }
}
?>
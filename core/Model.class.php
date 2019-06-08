<?php

require_once CONFIG+'database.php';
require_once 'php-activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory(MODEL);
    $cfg->set_connections(array(
        'development' => 'mysql://'+DB_CONFIG_USER+':'+DB_CONFIG_PASS+'@'+DB_CONFIG_HOST+'/'+DB_CONFIG_DB));
});

//ActiveRecord\Serialization::$DATETIME_FORMAT = DATETIME_DEFAULT_FORMAT;

class Model extends ActiveRecord\Model
{
    static $attr_protected = array('fields', 'types');

    /**
     * @var array $fields O conteúdo dessa classe serve para validação, define o type de cada input e sua classe (valor na posição 0)
     */
    public $fields;

    private $pagination = null;

    /**
     * @var array define a relação entre cada tipo de campo de $fields[0] e o tipo de input
     */
    public $types = array
    (
        'text' => 'text',
        'tel'   => 'text',
        'email' => 'text',
        'datetime' => 'text',
        'num' => 'text',
        'textarea' => 'textarea',
        'radio' => 'radio',
        'checkbox' => 'checkbox',
        'select' => 'select',
        'password' => 'password',
        'file' => 'file',
    );

    public function validate()
    {
        $this->beforeValidation();

        foreach ( $this->fields as $name => $rules )
        {
            $validator = Validator::getInstance();

            $errors = $validator->validate($this->$name, $rules);
            foreach( $errors as $key => $error)
            {
                $this->errors->add($name, $error);
            }
        }

        $this->afterValidation();
    }

    public function to_array_deep()
    {
        //converte as variáveis deste modelo
        $arr = $this->to_array();

        //converte as variáreis dos modelos subjacentes em profundidade
        foreach ( $arr as $k1 => $v1 )
        {
            if ( is_array( $v1 ) )
            {
                foreach ( $v1 as $k2 => $v2 )
                {
                    if ( $v2 instanceof Model ) $arr[$k1][$k2] = $v2->to_array_deep();
                }
            }
            elseif ( $v1 instanceof Model )
            {
                $arr[$k1] = $v1->to_array_deep();
            }
        }

        //retorna o array convertido para quem o chamou
        return $arr;
    }

    public function get_type($fieldName)
    {
        if ( isset($this->fields[$fieldName][0]) && isset($this->types[$this->fields[$fieldName][0]]) )
            return $this->types[$this->fields[$fieldName][0]];
        else return 'text';
    }

    public function get_class($fieldName)
    {
        if ( isset($this->fields[$fieldName]) )
        {
            return $this->fields[$fieldName][0];
        }
        else return NULL;
    }

    /**
     * Se o campo for select ou checkbox ou radiobutton
     *
     * @param $fieldName
     * @return null|array possíveis values setados no model
     */
    public function get_values($fieldName)
    {
        return isset($this->{$fieldName.'_values'}) ? $this->{$fieldName.'_values'} : NULL;
    }


    //CALLBACK METHODS ==================================================================

    public function afterValidation()
    {}

    public function beforeValidation()
    {}
}

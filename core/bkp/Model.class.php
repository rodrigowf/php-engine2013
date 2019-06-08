<?php
/**
 * Alguns detalhes importantes: um modelo é uma entidade que inclui dados e funções.
 * Esse dados podem incluir listas de modelos que também possuem funções.
 * Essas funções são de acesso à dados do banco, por isso o nome 'dataAcess' para a classe que as encapsula.
 *
 * Um DAO é um data acess object, objeto que também possui as mesmas funções dos modelos (do dataAcess.class),
 * mas que não representa um dado em específico mas o banco de dados, ou o "provedor de dados".
 *
 * Os dados de cada objeto do tipo Modelo (atributos ou modelos) estão encapsulados em uma variável de instância $data,
 * mas se você tentar acessá-los como se estivessem dentro do próprio objeto obterá sucesso, graças aos métodos getter and setter
 *
 */

require_once CORE . 'Validator.class.php';
require_once CORE . 'DataAcess.class.php';

require_once CONFIG . 'database.php';
require_once CONFIG . 'email.php';

class Model
{
    static $instances = array();

	public	$name;

	public	$fields;
	public	$validations;

	// Relacionamentos deste modelo
	public	$hasMany;
	public	$hasOne;
	public	$belongsTo;
	public	$hasAndBelongsToMany;

	private	$primaryKey = 'id';



    /**
     * garante que uma mesma classe modelo não seja instanciada infinitas vezes
     */
    static function getInstance($modelName)
    {
        $modelName = strtolower($modelName);

        if ( isset(self::$instances[$modelName]) ) return self::$instances[$modelName];

        if ( file_exists(MODEL . "$modelName.php") )
        {
            require_once 	MODEL . 'app_model.php';
            require_once	MODEL . "$modelName.php";

            $className = ucfirst($modelName);

            if( !class_exists($className) )
            {
                trigger_error("Nomenclatura inconsistente: classe modelo modelName nomeada incorretamente!!", E_USER_WARNING);
                return false;
            }

            //passa a referencia da classe para a variável de instancia com seu nome em letras minúsculas
            return self::$instances[$modelName] = NEW $className();
        }
        else
        {
            return false;
        }
    }

	static $typesList = array(
		//TODO essa lista
	);

	public function __construct()
	{
		parent::__construct();

		//Se o usuário não tiver setado o nome da tabela na mão ele seta automaticamente
		if( !isset($this->name) || $this->name === NULL ) $this->name = strtolower(__CLASS__);
		$this->table = $this->name; //para uso das funções de dataAcess

		$dataArr and $this->setDataFromArray($dataArr); //se estiver carregando com dados
	}

    public function prepareSelect($subTables = null, $parentDO = null, $parentRel = null)
    {
        $qryFields = '';
        $qryFrom = '';

        foreach ( $this->fields as $field => $prop )
        {
            $qry = $field+' AS '+$field+'_'+$this->name;
        }
        foreach ( $this->hasOne as $TableName )
        {
            $qry = $field+' AS '+$field+'_'+$TableName+'';
        }
        foreach ( $this->hasMany as $TableName )
        {
            $qry = $field+' AS '+$field+'_'+$TableName+'';
        }
        foreach ( $this->hasMany as $TableName )
        {
            $qry = $field+' AS '+$field+'_'+$TableName+'';
        }
    }

    /**
     * @param $dataRow
     * @param $subTables
     * @param null|DataObject $parentDO
     */
    public function filterFromSelect($dataRow, $subTables = null, $parentDO = null, $parentRel = null)
    {
        $parentRel = null;

        $thisData = array();

        foreach ( $dataRow as $i => $field )
        {
            $subData = array();

            $field = explode('_', $field);

            if( $field[2] == $this->name )
            {
                $thisData[] = $field[1];
                if ( isset( $parentDO ) ) $parentRel = $field[3];
            }
            elseif ( isset($test[3]) )
            {
                $subData
            }
        }
        foreach();
    }

	public function dbToDO()
    {

    }

	public function prepareParameters()
	{

	}

	public function getTypes()
	{
		foreach ( $this->fields as $name => $value )
		{
			$this->types['name'] = self::$typesList[$value];
		}
	}

	public function default_fieldBehaviour($fieldName)
	{
		$this->validations[$fieldName]['method'] or $this->validations[$fieldName]['method'] = $this->fields[$fieldName];
		//$this->validations[$fieldName]['dependencies'];
	}

	public function email_fieldBehaviour($fieldName)
	{

	}
}
<?php
require_once CORE . 'Model.class.php';

/**
 * Aqui vão as funções referentes à cada tipo de elemento (tabela).
 * Inserir-se, atualizar-se, excluir-se.
 * validar-se.
 *
 * Aqui vai um array com
 *
 * Essa classe é um singleton, e ela vai ser instanciada indiretamente através das classes modelos.
 */
class DataAcessObject
{
    /** @var Model */
    private $model  = NULL;
    public  $data   = NULL;

	private function __construct($modelName)
    {
        $this->model = Model::getInstance($modelName);
	}

    public function loadDOFromArray($dataArr)
    {
        $singleModel = true;

        foreach ( $dataArr as $index => $value )
        {
            if ( is_numeric($index) )
            {
                $className = ucfirst($this->name);
                $this->data[] = new $className($value);
            }
            else
            {
                $singleModel = true;
            }
        }

        if ( $singleModel )
        {
            $className = ucfirst($this->name);
            $this->data[] = new $className($dataArr);
        }
    }

    /**
     * Conta o número de correspondencias,
     * Se nenhum parametro é passado conta o número total de colunas
     */
    public function dcount($where = '', $replacements = '', $table = NULL, $cache = NULL )
    {
        $table or $table = $this->table;

        $db = Database::getDB();
        return $db->dcount('*', $table, $where, $replacements, $cache);
    }

    public function lookup($where, $vars, $table = NULL, $cache = FALSE)
    {
        $table or $table = $this->table;

        $db = Database::getDB();
        return $db->dlookup('*', $table, $where, $vars, $cache);
    }

    /**
     * Busca várias linhas de uma tablea que batam com a condição
     *
     *  @param string $method: recebe 'all' para buscar todos as entradas de uma tabela ou o nome de uma coluna para ser pesquisada
     *  @param string/int/float/qualquer_coisa $value: o valor que será comparada na coluna value
     */
    public function find($where = '', $replacements = '', $columns = '*', $limit = '', $order = '', $cache = FALSE, $calc_rows = false)
    {
        $db = Database::getDB();
        $return = $db->select($columns, $this->table, $where, $replacements, $limit, $order, $cache, false, $calc_rows);
        return $this->fetchResult($return);
    }

    /**
     * Busca uma linha da tabela que bata com a condição
     * Se nenhum where é passado ele assume que a chave buscada é a chave primária (id)
     */
    public function read($replacements = '', $where = 'id = ?', $columns = '*', $cache = FALSE)
    {
        if ( is_string($replacements) && $replacements !== '' )
        {
            $replacements = array($replacements);
        }

        return $this->find($columns, $where, $replacements, $limit = '1', $cache, $calc_rows = false);
    }

    public function insert($data)
    {
        /*
        if ( count($_FILES) > 0 )
        {
            require_once MODEL . 'files.php';
            $files = new Files();
            $ret = $files->upload(); //TODO botar um teste e trigger error aqui
            $data = array_merge_recursive($data, $ret);
        }1
        */

        $db = Database::getDB();
        return $db->insert($data);
    }

    public function delete($where)
    {
        $db = Database::getDB();
        return $db->delete($this->tableName,$where);
    }

    public function update($data)
    {
        $db = Database::getDB();
        if(is_object($db))
        {
            return $db->update($data);
        } else echo 'Não instanciou o objeto';
    }

    public function fetchResult()
    {
        $db = Database::getDB();
        $this->model->dbToDO($this->model->filterDatabaseRow)

        return $this->data;
    }
}

<?php
/**
 * Aqui vão as funções referentes à cada elemento.
 * Inserir-se, atualizar-se, excluir-se.
 * validar-se.
 *
 * Aqui vão todos os dados referentes à essa entidade
 *
 * Essa classe é um singleton, e ela vai ser instanciada indiretamente através das classes modelos.
 */
class DataObject
{
    private $model  = NULL;
    private	$valErrors;					//erros de validação

    private $data;

	public function __construct($modelName, $dataArr = NULL)
	{
        $this->model = Model::getInstance($modelName);
        $this->data = $this->model->filterDatabaseRow($dataArr);
	}

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function validate($data, $rules = NULL)
    {
        $rules = $rules ? $rules : $this->getValidationRules();
        $validator = $this->validator ? $this->validator : $this->validator = NEW Validator;
        $this->valErrors = $validator->validate($data, $rules);

        return $this->valErrors;
    }

    public function toArray()
    {

    }
}

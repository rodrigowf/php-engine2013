<?php
require_once CORE . 'Encryption.class.php';
require_once CORE . 'Email.class.php';


/**
 * User: Rodrigo
 * Date: 12/09/12
 * To change this template use File | Settings | File Templates.
 */
class DataAcess
{
	public $table;

	private $data;

	private $debug = true;
	private $cache = false;

	private $email 			= NULL; 	//instancia da classe de envio de emais)



	//=============================================================================

	public function __construct()
	{
		$this->debug = isset($GLOBALS['debugger']->debugDB)
			? $GLOBALS['debugger']->debugDB
			: false;
	}











	// Para caso eu decida passar as validações através da variável fields,
	// nesse caso eu terei que separar essas informações aqui.
	private function getValidationRules()
	{
		return $this->validation;
	}



	public function encrypt($string)
	{
		return sha1($string);
	}

	public function autoMail()
	{

	}

	public function email($destination, $from, $message, $subject)
	{
		$this->email or $this->email = new Email($destination,$from);
		return $this->email->sendEmail($subject,$message);
	}

	/**
	 * Preenche o array local$datas com toos os modeloss relacionadas à ese
	 * para que eles se busquem ou insiram no banco

	 */
	private function autoloadRelateds()
	{
		$this->hasMany;
		$this->hasOne;
		$this->belongsTo;
		$this->hasAndBelongsToMany;
	}

	/**
	 * Extrai os resultados retornados pelo bd e as coloca no formato definido pelo sistema.
	 * Deve ser chamada após cada query de select.
	 * Exige que a variável '$relatedModels' esteja preenchida de acordo com o resultado buscado.
	 */

	// vai pegar o array retornado do banco de dados, eliminar as colunas que não são desse modelo de dados
	// e eliminar as repetições
	// se tiver vários ele vai se guiar pelo id e segundo o padrão de nomenclatura de nomes de retormo de query
	// (esse também será montado automaticamente)/
	private function fetchResult()
	{
		if ( !$this->db ) trigger_error('Função fetchResult foi chamada mas nenhuma query foi executada!', E_USER_ERROR);

		$returnedModels = $this->relatedModels;
		$tableName = $this->table;
		$result = array();

		if ( !$returnedModels || !is_array($returnedModels) || count($returnedModels) < 1 )
		{
			$tableName = $this->table;
			while ( $row = $this->db->fetch_assoc() )
			{
			//	$result[][$tableName] = $row;
			}
		}
		else
		{
			$i = 0;

			// pega cada linha do banco de dados
			while ( $row = $this->db->fetch_assoc() )
			{
				$thisRow = array_slice($row, count($this->fields));

				if ( $i == 0 || ( $result[$i-1][$tableName] == $thisRow ) )
				{
					$result[$i][$tableName] = $thisRow;
					$i++;
				}

				// separa cada linha em várias tabelas
				foreach( $returnedModels as $model )
				{
					$thisRow = array_slice($row, count($model->fields));


					if ( $i == 0 || ( $result[$i-1][$model->table] != $thisRow ) )
					{
						if ( isset($result[$i][$tableName]) )
						{

						}
					}
				}

				$i++;
			}
		}

		return $result;
	}
	 //*/
}

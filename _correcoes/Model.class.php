<?php
require CORE . 'Database.class.php';
require CORE. 'Validacao.class.php';
require CORE. 'Encryption.class.php';
require CORE. 'Email.class.php';

class Model 
{
	//private $tableName;
	public $tableName;
	private $db;
	private $val;
	
	public $validationErrors = null;
	
	//para ser sobreescrito
	public $validation = null; //regras de validação

    public function __construct()
	{
		$this->validationErrors = array();
	}
	
	private function getDB(){
		if(!$this->db){
			$this->db = Database::singleton();
		}
		return $this->db;
	}	

    public function checkExistence($field,$content,$table){
            $db = $this->getDB();
               if(is_object($db))
               {
                   return $db->DoItExists($table,$field,$content);
               } else trigger_error('Não instanciou o objeto');
    }

	public function find($method = 'all'){
		if($method == 'all'){
            $db = $this->getDB();
            $retorno = $db->selectRelacional($this->tableName);
			return $retorno;
		}
	}

    public function findInverted($method = 'all' , $column = 'id'){
        if($method == 'all'){
            $db = $this->getDB();
            $retorno = $db->selectRelacionalInverted($this->tableName, $column);

            return $retorno;
        }
    }


    /*
     * Essa função realiza uma query com retorno controlado
     * Só realiza comparações de igualdade no banco
     * @param string $campo: o nome da coluna da tabela que será avaliada
     * @param string/int/ float $title: o valor que será verificado pela igualdade na coluna
     */

    public function read($campo, $title){
            $db = $this->getDB();
            $retorno = $db->selectRelacionalByTitle($this->tableName, $campo, $title);
            return $retorno;
    }


	public function insert($data){
		$db = $this->getDB();
		
		$val = $this->validate($data);
		
		if ( $val  ) 
		{
			return $db->insert($data);
		}
		else 
		{
			return false;
		}
		
	}

    public function insertNews($data){
        $db = $this->getDB();
        return $db->insertNews($data);
    }
	
	public function delete($where){
		$db = $this->getDB();
		return $db->delete($this->tableName,$where);	
	}

    public function update($data){
        $db = $this->getDB();
        if(is_object($db))
        {
            return $db->update($data);
        } else echo 'Não instanciou o objeto';
    }

    public function updateNews($data){
        $db = $this->getDB();
        if(is_object($db))
        {
            return $db->updateNews($data);
        } else echo 'Não instanciou o objeto';
    }


	private function GetValidation(){
		if(!$this->val){
			$this->val = new validacao();	
		}
		return $this->val;
	}
	
	public function validate($data){
		$validator = $this->GetValidation();
		$validator->setRules($this->validation);
		
		$return = $validator->validate($data);
			
		array_push($this->validationErrors, $validator->errorArray);
		
		if($return){
			return true;
		}else{
			return false;
		}
	}

	public function encrypt($string){
	  return md5($string);
	}

	public function confirmHash($hash,$password){
		return Crypter::check_password($hash,$password);
	}


    /*
     * Pega uma data no formato normal (dd/mm/yyyy)
     * e retorna essa data no formato do bd (yyyy-mm-dd)
     *
     */
    public function dataBD($date){

        $arrayDate = explode("/",$date);
        $dia = $arrayDate[0];
        $mes = $arrayDate[1];
        $ano = $arrayDate[2];

        $arrayDate[0] = $ano;
        $arrayDate[1] = $mes;
        $arrayDate[2] = $dia;

        $newDate = implode("-", $arrayDate);
        return $newDate;
    }


   /*
    * Pega uma data no formato do bd (yyyy-mm-dd)
    * e retorna essa data no formato normal (dd/mm/yyyy)
    *
    */

    public function dataNormal($date){

        $arrayDate = explode("-",$date);
        $aux = explode(" ",$arrayDate[2]);

        $ano = $arrayDate[0];
        $mes = $arrayDate[1];
        $dia = $aux[0];

        $arrayDate[0] = $dia;
        $arrayDate[1] = $mes;
        $arrayDate[2] = $ano;

        $newDate = implode("/", $arrayDate);
        return $newDate;

    }

    public function sendEmail($destino,$from,$message,$subject = "Sobre Jewc 2012"){
           $email = new Email($destino,$from);
           if($email->sendEmail($subject,$message)) return TRUE;
            else return FALSE;
    }

    public function recursiveDecode($array) {
        if(is_array($array)) {
            foreach($array as $key => $value) {
                if(is_array($array[$key]))
                    $array[$key] = $this->recursiveDecode($array[$key]);

                if(is_string($array[$key]))
                    $array[$key] = utf8_decode($array[$key]);
            }
        }
        if(is_string($array))
            $array = utf8_decode($array);
      return $array;  }


}

<?php
/** Uma classe em PHP para manipular database MySQL.
   * @property mixed results
   * @version  1.1
   * @see Singleton Implemented [Not in Use]
   * @todo Sistema de debugação como pensado pelo @author, e o que der na teia.
   * @author   Felipe de Souza
   */

class Database{
	 
	static private $instance;
	 
	private $db_host = BD_CONFIG_HOST;     		// Database Host / IP
    private $db_user = BD_CONFIG_USER;          // Username
    private $db_pass = BD_CONFIG_PASS;          // Password
    private $db_name = BD_CONFIG_DB;          	// Database
    private $db_charset = BD_CONFIG_CHARSET;    // Charset

	private $con = false;
    private $result = array();

    /* private function __construct(){
      if(!$this->con){
          $myconn = @mysql_connect($this->db_host,$this->db_user,$this->db_pass);
          if($myconn){
              mysql_select_db($this->db_name);
              $seldb = @mysql_set_charset($this->db_charset,$myconn);
              if($seldb){
                  $this->con = true;
                  return true;
              } else return false;
          } else return false;
      } else return true;
  }
    */

   private function __construct(){
          $conn = mysql_connect($this->db_host, $this->db_user, $this->db_pass)
          or trigger_error ("N&atilde;o foi poss&iacute;vel conectar ao Banco de Dados. ".mysql_error(), E_USER_ERROR);
          mysql_select_db($this->db_name) or trigger_error("Erro ao selecionar Banco.", E_USER_ERROR);
          mysql_set_charset($this->db_charset, $conn);
          if($conn) $this->con = true;
   }

     /** Singleton da classe \n
     * Use isto para instancia a mesma
     */
	
	static public function singleton() {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }
        return self::$instance;
    }
	
	private function __clone(){}
	
	public function connect(){
        if(!$this->con){
            $myconn = @mysql_connect($this->db_host,$this->db_user,$this->db_pass);
            if($myconn){
                $seldb = @mysql_select_db($this->db_name,$myconn);
                if($seldb){
                    $this->con = true;
                    return true;
                } else return false;
            } else return false;
        } else return true;       
    }
	
	/** Fecha a conexão e reconecta mudando o schema padrão
      * @param string $name:  nome do eschema
      * @return bool em virtude de fazer o $this->connect();
      */
	
	public function setDatabase($name){
        if($this->con){
            if(@mysql_close()){
                $this->con = false;
                $this->results = null;
                $this->db_name = $name;
                $this->connect();
            }
        }
  	 }
	 
	/** Checa se existe uma tabela com o nome no database, ajuda a economizar tempo e performance em funcoes que utilizem o nome de uma tabela.
      * @param $table a tabela
      * @return bool : true or false
      */
	  
	private function tableExists($table){
        $tablesInDb = @mysql_query('SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');
        if($tablesInDb)
        {
            if(mysql_num_rows($tablesInDb)==1) return true;
            else return false; 
        }
    }
	
	/** Faz um escape recursivo das strings utlizando o método mysql_real_escape_string padrão do PHP
      * @param string/array : o que você quer escapar
      * @return array/string : paramentro retornado escapado.
      */
	  
	private function recursiveEscape($q) {
     if(is_array($q)) 
         foreach($q as $k => $v) 
             $q[$k] = $this->recursiveEscape($v);
     elseif(is_string($q))
         $q = mysql_real_escape_string($q);
    	 return $q;
	}
	
	
	/** Roda uma query no db.
      * @param $query A query.
      * @return Retorna Falso caso a query falhe, se não seta o array privado result com o resultado..
      */
	  
	public function query($query){
      $query = @mysql_query($query);
	  if($query){
		  	$this->result = $query;	
			return TRUE;
	  } else return FALSE;
    }


	/** Faz o mesmo que a função Query() mas não guarda resultado.\n
      * Deve ser usada para: INSERT, UPDATE, DELETE...
      * @param string $query A query.
      * @return TRUE/FALSE rodou ou não rodou?
      */
	  
    public function execute($query){
      $a = @mysql_query($query);
	  if($a) return TRUE;
	  else 
	  {
		trigger_error("Database error: erro na query - $query <b>Error:</b> ".mysql_error());
		return FALSE;
	  }
    }
	
	/** Um método bem conveniente para mysql_fetch_object() : http://php.net/manual/pt_BR/function.mysql-fetch-object.php.
      * @param $result A resource retornada pela query(). Se for NULL, será usado o ultimo resultado retornado pela query().
      * @return Um objeto representando uma data row..
      */
	  
    public function fetchResourceToObject($result = NULL){
      if ($result == NULL) $result = $this->result;
      if ($result == NULL || mysql_num_rows($result) < 1) return NULL;
      else return mysql_fetch_object($result);
    }
	
	/** Retorna o número de linhas modadas/retornadas pela ultima consulta.
      * @param $result A resource retornada pela query(). Se for NULL, será usado o ultimo resultado retornado pela query().
      * @return O número de linhas da consulta (>=0).
      */
	  
    private function numRows($result = NULL){
      if ($result == NULL) return mysql_num_rows($this->result);
      else return (int) mysql_num_rows($result);
    }
	
	/** Pega o resultado de uma query como objeto, a query deve retornar apenas uma linha.\n
      * Note: Não precisa adicionar 'LIMIT 1' no final da query \n
      * o método vai adicionar isso (por propósitos de performance).
      * @param string $query A query.
      * @return object Um objeto representado a informação (ou NULL se for vazio)
      */
    function queryUniqueObject($query)
    {
      $query = "$query LIMIT 1";
      $result = mysql_query($query);
	  if(!$result) return FALSE;
	  else return mysql_fetch_object($result);
    }
	
	 /** Pega o valor maximo de uma coluna na tabela com uma condição.
      * @param  string $column A coluna de onde quer o maximo
      * @param  string $table A tabela padrão.
      * @param string $where A condicao.
      * @return O valor máximo (ou NULL se for vazio).
      */
    function maxOf($column, $table, $where)
    {
      return $this->queryUniqueValue("SELECT MAX(`$column`) FROM `$table` WHERE $where");
    }
	
    /** Faz um select no database
    * @param string $table : o nome da tabela
    * @param string rows (a coluna que você quer separado por virgulas)
    * @param string where string com o nome do where
	* @return bool true or false pra ver se tudo ocorreu bem, caso tenha, getResults() e pegue o resource referente ao que você quer.
    */
    public function select($table, $rows = '*', $where = null){
		$table = $this->recursiveEscape($table);
		$rows = $this->recursiveEscape($rows);
		
        $q = 'SELECT '.$rows.' FROM '.$table;
	
        if($where != null){
		 $where = $this->recursiveEscape($where);
		 $q .= ' WHERE '.$where;
	}
		 
        $query = @mysql_query($q);
		if($query) {
			$n = $this->numRows($query);
            
			for($i = 0; $i < $n; $i++){
                $r = mysql_fetch_array($query);
                $key = array_keys($r);
				for($x = 0; $x < count($key); $x++){
                    if(!is_int($key[$x])){
                        if(mysql_num_rows($query) > 1) $this->result[$i][$key[$x]] = $r[$key[$x]];
                        else if(mysql_num_rows($query) < 1) $this->result = null;
                        else $this->result[$key[$x]] = $r[$key[$x]];
                    }
                }
            }
		    return true;
        }
        else return false;     
    }
	
	/** Faz um fetch assoc e retorna no padrão [tabela.coluna]
	* @param resource : result de uma query
	* @return array : a matriz associativa
	*/ 
	
	private function mysql_fetch_assoc_fullname($r) { 

     $f = mysql_fetch_row($r);

     if($f === false) return false;

     $tmp = array(); 
     foreach($f as $k => $v) 
     { 
         $tmp[mysql_field_name($r, $k)] = $v; 
     }

    	return $tmp; 
	 }
	
	/** Faz um select relacional e retorna um array lindo de se ver (ainda nao funciona)
    * @param string $table : o nome da tabela
	* @return bool true or false pra ver se tudo ocorreu bem
    */
    public function selectRelacional($table){
		$table = $this->recursiveEscape($table);
		
        $q = 'SELECT * FROM '.$table;
		
        $query = @mysql_query($q);
		if($query) {

			while($rs2 = $this->mysql_fetch_assoc_fullname($query)){                
	      		 $array[][$table] = $rs2;        
	    	}
			
            return $array;
            }
        else return false;     
    }


    public function selectRelacionalInverted($table, $column, $last = NULL, $notInverted = NULL){
        $table = $this->recursiveEscape($table);
        $column = $this->recursiveEscape($column);
        $last = $this->recursiveEscape($last);

        if($notInverted == NULL){
            if($last == NULL){
                $q = 'SELECT * FROM '.$table.' ORDER BY '.$column.' DESC;';
            }
            else{
                $q = 'SELECT * FROM '.$table.' ORDER BY '.$column.' DESC LIMIT 1;';
            }
        }
        else{
            if($last == NULL){
                $q = 'SELECT * FROM '.$table.' ORDER BY '.$column.' ASC;';
            }
            else{
                $q = 'SELECT * FROM '.$table.' ORDER BY '.$column.' ASC LIMIT 1;';
            }

        }

        $query = @mysql_query($q);

        if($query) {

            while($rs2 = $this->mysql_fetch_assoc_fullname($query)){
                $array[][$table] = $rs2;
            }

            return $array;
        }
        else return false;
    }


    public function selectRelacionalByTitle($table, $campo, $title, $single = true){
        $table = $this->recursiveEscape($table);
        $campo = $this->recursiveEscape($campo);
        $title = $this->recursiveEscape($title);

        $q = "SELECT * FROM ".$table." WHERE  ".$campo." = '$title';";

        $query = @mysql_query($q);
        $array = array();
        if($query) {

            /*echo "<pre>";
            print_r(array_keys(mysql_fetch_assoc($query)));
            echo "</pre>";
*/
            if($single){
                 while($rs2 = $this->mysql_fetch_assoc_fullname($query)){
                     $array[$table] = $rs2;
                 }
            }
            else {
                while($rs2 = $this->mysql_fetch_assoc_fullname($query)){
                    $array[$table][] = $rs2;
                }
            }

            return $array;
        }
        else return false;
    }

    public function selectRelacionalFeio($table, $where = null, $fullQuery = null){
        $table = $this->recursiveEscape($table);
        $where = $this->recursiveEscape($where);

       $where = stripslashes($where);
       $fullQuery = stripslashes($fullQuery);

        if($fullQuery == null){
            $q = "SELECT * FROM ".$table." WHERE  ".$where.";";
        }
        else{
            $q = $fullQuery;
        }


        $query = @mysql_query($q);

        if($query) {

            /*echo "<pre>";
            print_r(array_keys(mysql_fetch_assoc($query)));
            echo "</pre>";
*/
            while($rs2 = $this->mysql_fetch_assoc_fullname($query)){
                $array[][$table] = $rs2;
            }

            return $array;
        }
        else return false;
    }


	
	/** Faz um 9 na database
    * @param string $table : o nome da tabela
    * @param string/array $values : valores a serem inseridos na tabela (string separados por virgula, ou um array)
    * @param string rows : Optional -> usado para aquela notação do insert que utiliza nome dos campos na tabela(isto normlamente é usado quando não se quer inserir todos os campos);
	* @return bool true/false : foi / não foi
    */
	
	public function insertGenerico($table,$values,$rows = null){

       	$table = $this->recursiveEscape($table);
	    if($this->tableExists($table)){
            $insert = 'INSERT INTO '.$table;
            
			if($rows != null){
				$rows = $this->recursiveEscape($rows);
                $insert .= ' ('.$rows.')';
            }
			
			$values = $this->recursiveEscape($values);
            for($i = 0; $i < count($values); $i++){
                if(is_string($values[$i]))
                    $values[$i] = '"'.$values[$i].'"';
            }
			
            $values = implode(',',$values);
            $insert .= ' VALUES ('.$values.')';

            $ins = $this->execute($insert);
            
			if($ins) return true;
            else return false;
        }
    }
	
	
	/** Faz um insert com array no estilo $dados[NomeTabela][NomeColuna]
	* @param array $a : array informacoes
	* @return bool, true/false
	*/
	
	public function insert($a){
        $this->recursiveEscape($a);
		foreach($a as $b => $c){
			if($this->tableExists($b))
			{
                $stringAux = '';
                $stringAux2 = '';
				$ins = 'INSERT INTO '.$b.' (';
				foreach($c as $d => $e){
                    $stringAux .= " $d,";
				}
			} 
			else 
			{
				trigger_error("Database error: Erro na inserção - A entidade '$b' não existe!", E_USER_WARNING);
				return FALSE;
			}
		 
				$ins .= rtrim($stringAux, ",");
				$stringAux = '';
				$ins .= ') VALUES (';
				
					foreach($c as $d => $e){
						if($e == 'DEFAULT' || $e == 'default' || $e == 'NOW()'){
                            $stringAux2 .= "$e,";
						} else if(is_numeric($e)) $stringAux2 .= "$e,";	
						else $stringAux2 .= "'$e',";
					}
				
				$ins .= rtrim($stringAux2, ",");
				$stringAux2 = '';
				$ins .= ')';
                $executaInsert = $this->execute($ins);
				if(!$executaInsert) return false;
			}
		$ins = '';
		return true;
	}

    public function insertNews($a){
        $this->recursiveEscape($a);
        foreach($a as $b => $c){
            if($this->tableExists($b)){
                $stringAux = '';
                $stringAux2 = '';
                $ins = 'INSERT INTO '.$b.' (';
                foreach($c as $d => $e){
                    $stringAux .= "$d,";
                }
            } else return FALSE;

            $ins .= rtrim($stringAux, ",");
            $stringAux = '';
            $ins .= ') VALUES (';

            foreach($c as $d => $e){
                if($e == 'DEFAULT' || $e == 'default' || $e == 'NOW()'){
                    $stringAux2 .= "$e,";
                } else if(is_numeric($e)) $stringAux2 .= "$e,";
                       else{
                            $e = htmlentities($e,ENT_QUOTES,"UTF-8");
                            $stringAux2 .= "'$e',";
                       }
                }


            $ins .= rtrim($stringAux2, ",");
            $stringAux2 = '';
            $ins .= ')';
            $executaInsert = $this->execute($ins);
            if(!$executaInsert) return false;
        }
        $ins = '';
        return true;
    }


	/** Faz um delete caso a condição retorne TRUE
    *   @param string $table: tabela (o nome da tabela)
    *   @param string $where: (condition [column =  value])
    */
    public function delete($table,$where = null){

        if($this->tableExists($table)){
            if($where == null){
                $delete = 'DELETE '.$table;
            }
            else {
                $delete = 'DELETE FROM '.$table.' WHERE '.$where;
            }
            $del = @mysql_query($delete);

            if($del) return true;
            else return false;    
        }
        else return false; 
    }
	
	/*Faz um update 
	*@param array: ao estilo do insert NAO TESTEI!
	*@return bool : padrao
	*/
	
	public function update($a){
		$this->recursiveEscape($a);
		foreach($a as $b => $c){
			if($this->tableExists($b)){
				$this->query("SHOW columns from $b where `key` = 'PRI'");
					$tableField = $this->getResult();
					$tableField = $this->mysql_fetch_assoc_fullname($tableField);
					$primaryKey = $tableField['Field'];
				$stringAux = '';
                $stringAux2 = '';
				$ins = 'UPDATE '.$b.' ';
				foreach($c as $d => $e){
                    if($d == 'where' || $d == 'WHERE') $stringAux2 .= " $d $primaryKey = '$e'";
                    else $stringAux .= "$d = '$e',";
				}
				$ins .= ' SET ';
			}else return FALSE;
				$ins .= rtrim($stringAux, ",");
				$stringAux = '';
				$ins .= rtrim($stringAux2, ",");
            	$stringAux2 = '';
                $executaInsert = $this->execute($ins);
				if(!$executaInsert) return false;
			}
        $ins = '';
		return true;	
	}

    public function updateNews($a){
        $this->recursiveEscape($a);
        foreach($a as $b => $c){
            if($this->tableExists($b)){
                $this->query("SHOW columns from $b where `key` = 'PRI'");
                $tableField = $this->getResult();
                $tableField = $this->mysql_fetch_assoc_fullname($tableField);
                $primaryKey = $tableField['Field'];
                $stringAux = '';
                $stringAux2 = '';
                $ins = 'UPDATE '.$b.' ';
                foreach($c as $d => $e){
                    if($d == 'where' || $d == 'WHERE'){
                        $stringAux2 .= " $d $primaryKey = '$e'";
                    }
                    else{
                        $e = htmlentities($e, ENT_QUOTES, "UTF-8");
                        $stringAux .= "$d = '$e',";
                    }
                }
                $ins .= ' SET ';
            }else return FALSE;
            $ins .= rtrim($stringAux, ",");
            $stringAux = '';
            $ins .= rtrim($stringAux2, ",");
            $stringAux2 = '';
            $executaInsert = $this->execute($ins);
            if(!$executaInsert) return false;
        }
        $ins = '';
        return true;
    }

	/** Conta os elementos da tabela */
	
	public function Count($a,$where= NULL, $value= NULL){
		$a = $this->recursiveEscape($a);

        if(is_null($where)) {
            $this->query("SELECT COUNT(*) as count from $a");
        }
        else{
            $this->query("SELECT COUNT(*) as count from $a where $where = '$value';");
        }

        return mysql_fetch_assoc($this->getResult());
	}

    public function countFeio($a,$where= NULL){
        $a = $this->recursiveEscape($a);

        if(is_null($where)) {
            $this->query("SELECT COUNT(*) as count from $a");
        }
        else{
            $this->query("SELECT COUNT(*) as count from $a where $where ;");
        }

        return mysql_fetch_assoc($this->getResult());
    }



    /* Checa se existe algo já
     * @param string $field: o campo
     * @param string $content: o conteudo
     * @param string $table: a tabela
     * @return bool : true se existir false se não.
     */

    public function DoItExists($table,$field,$content){
        $table = $this->recursiveEscape($table);
        $field = $this->recursiveEscape($field);
        $content = $this->recursiveEscape($content);
        $q = "Select * from $table where $field = '$content'";
        if($this->query($q)) $a = $this->getResult();
        else trigger_error("Não conseguiu rodar a query");

        if($a){
        if($this->numRows($a) > 0) return TRUE;
            else return False;
        }
    }

	/** Retorna o resultado da ultima função de query utilizada.
	  * @return o result vindo da ultima funçao de query utilizadas pela classe..
      */
	public function getResult(){
        return $this->result;
    }

}
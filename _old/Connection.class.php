<?php
class Connection {
	public $server;
	public $user;
	public $password;
	public $database;
	public $charset;
	
	public $conn;
	
	
	public function __construct($server = null, $user = null, $password = null, $database = null, $charset = null){

		$this->server		= $server 	== null ? BD_CONFIG_SERVIDOR	: $server;
		$this->user			= $user 	== null ? BD_CONFIG_USUARIO		: $user;
		$this->password		= $password == null ? BD_CONFIG_SENHA		: $password;
		$this->database		= $database == null ? BD_CONFIG_BANCO		: $database;
		$this->charset		= $charset 	== null ? BD_CONFIG_CHARSET		: $charset;
		
		$this->conecta();
	}
	
	public function conecta(){
		$this->conn = mysql_connect($this->server, $this->user, $this->password)
		or die ("<br /><br />N&atilde;o foi poss&iacute;vel conectar ao Banco de Dados.<br />Contacte o Administrador do Sistema.<br /><br />".mysql_error());
		
		mysql_select_db($this->database, $this->conn) or die ("Erro ao selecionar Banco.");
		mysql_set_charset($this->charset, $this->conn);
		
		//TODO tirar or dies e lançar excessões.
	}
	
	public function __destruct(){
		if(isset($this->conn) && gettype($this->conn) == "mysql link") {
			mysql_close($this->conn);
			settype($this, "null");
		}
	}
	
	/**
	 * Realiza uma query e retorna o resultado.
	 * @return matrix/array/field/boolean(in case of nothing in return)
	 * @param string $query
	 * @param string[optional] $tipoRetorno tipos: "matrix", "array", "field"
	 */
	public function query($query, $tipoRetorno = "matrix"){

		//debug($query);
		
		if($resultSet = mysql_query($query, $this->conn))
			if(is_resource($resultSet)){
				$retorno = array();
				if($tipoRetorno == "matrix"){
					while($resultado = mysql_fetch_assoc($resultSet)){
						array_push($retorno, $resultado);
					}
				}
				elseif($tipoRetorno == "array"){
					$retorno = mysql_fetch_assoc($resultSet);	
				}
				elseif($tipoRetorno == "field"){
					$arr = mysql_fetch_assoc($resultSet);
					$retorno = $arr[0];	
				}
				else{
					//TODO lançar excessão: parametro inválido.
					return null;
				}

				return $retorno;
			}else{
				return true; //sucesso na realização da query mas nenhum retorno alem de true.
			}
		else {
			//TODO lançar a exceção: erro de query (imprimir query e mysql_error).
			return false;
		}		
	}
	
	public function select($entidades, $condicoes = null, $tipoRetorno = "matrix"){
		if(is_array($entidades)) 	$strEntidades = implode(", ", $entidades);
		else 						$strEntidades = $entidades;
		
		$query = "SELECT * FROM $entidades";
		
		//esse bloco computa as condições, recebe um array associativo de (campo => valor)
		//e só computa a condição de igualdade!
		if($condicoes != null && is_array($condicoes)){
				
			$arrCondicoes = array();
			foreach($condicoes as $index => $value){
				array_push($arrCondicoes, "$index = '$value'");
			}
			$strCondicoes = count($arrCondicoes) > 1 ? implode(" AND ", $arrCondicoes) : $arrCondicoes[0];
			
			$query .= " WHERE $strCondicoes";
			
		}else{
			//TODO lançar excessão: parametro inválido.
		}
		
		$query .= ";";
		
		return $this->query($query, $tipoRetorno);
	}
	
	public function insert(){
		
	}
	
	public function delete(){
		
	}
	
	public function update(){
		
	}
	
	public function count(){
		
	}
}
?>
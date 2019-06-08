<?php
	class Conexao{
		public $strServidor 	= "localhost";
		public $strUsuario 	= "root";
		public $strSenha 		= "";
		public $strBD		 	= "";
		public $charset		= "utf8";
		
		public $conn;
		
		public function __construct() {
			$this->conn = mysql_connect($this->strServidor, $this->strUsuario, $this->strSenha)
			or die ("<br /><br />N&atilde;o foi poss&iacute;vel conectar ao Banco de Dados.<br />Contacte o Administrador do Sistema.<br /><br />".mysql_error());
			mysql_select_db($this->strBD) or die ("Erro ao selecionar Banco.");
			mysql_set_charset($this->charset, $this->conn);
		}
		
		public function __destruct(){
			if(isset($this->conn) && gettype($this->conn) == "mysql link")
			{
				mysql_close($this->conn);
				settype($this, "null");
			}
		}
	}	
	
	$conexao = new Conexao();
	/*Coloca os campos públicos da classe como variáveis normais*/
	$conn = $conexao->conn;
	$strServidor 	= $conexao->strServidor;
	$strUsuario 	= $conexao->strUsuario;
	$strSenha 		= $conexao->strSenha;
	$strBD		 	= $conexao->strBD;
	$charset		= $conexao->charset;
?>

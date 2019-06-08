<?php
	function notEmpty($value){
		$value = trim($value); // Tiro qualquer caractere de espaço do inicio e do final da string
		if($value == ""){ // Verifica se o usuário realmente colocou um conteúdo válido
			return false;
		}
		else{
			return true;
		}
	}
	
	function numerico($value){
		return is_numeric($value);
	}
	
	function email($value) {
		if(preg_match('/^(([a-zA-Z])([a-zA-Z0-9_\.-]+)(@)([a-zA-Z0-9_\-]+)(\.[a-zA-Z0-9.]+))$/', $value) == 0) {
			return false;
		}
		else {
			return true;
		}
	}
	
	function telefone($value) {
		if(preg_match('@^(\([0-9]{2}\)[0-9]{4}-[0-9]{4})$@', $value) == 0) {
			return false;
		}
		else {
			return true;
		}
	}
	
	function cpf($value) {
		if(preg_match('@^([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})$@', $value) == 0) {
			return false;
		}
		else {
			return true;
		}
	}
	
	function data($value) {
		if(preg_match('@^((0[1-9]|3[0,1]|[1,2][0-9])/(0[1-9]|1[0,1,2])/[0-9]{4})$@', $value) == 0) {
			return false;
		}
		else {
			return true;
		}
	}
	
	function url($value) {
		if(preg_match('@^((http[s]?://|ftp://)?(www\.)?[a-zA-Z0-9-\.]+\.(com|org|net|mil|edu|ca|co.uk|com.au|gov|br))$@', $value) == 0){
			return false;
		}
		else {
			return true;
		}
	}
	
	function maxLength($value, $length) {
		if(strlen($value) > ($length))
			return false;
		else
			return true;
	}
	
	function equals($value, $compare) {
		$value = trim($value); // Tiro qualquer caractere de espaço do inicio e do final da string
		$compare = trim($compare); // Tiro qualquer caractere de espaço do inicio e do final da string
		if(strcmp($value, $compare) != 0)
			return false;
		else
			return true;
	}
?>
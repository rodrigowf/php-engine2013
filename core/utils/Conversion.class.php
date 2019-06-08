<?php
class Conversion {
	
		/**
	 * Recebe a data no formato do banco de dados e retorna ela formatada.
	 * @param $dataHora
	 * @return $data
	 */
	function date($date, $format = "d/m/Y"){
		return date($format, strtotime($date));
	}
	
	/**
	 * Recebe a hora no formato do banco de dados e retorna ela formatada.
	 * @param $dataHora
	 * @return $hora
	 */
	function hour($hora, $format = 'H:i:s'){
		return date($format, strtotime($hora));
	}
	
	function dateBr2BD($data){
		$arr	=	explode('/', $data);
		if (sizeof($arr) == 3 ) {
			return $arr[2] . '-' . $arr[1] . '-' . $arr[0];
		}
		return null;
	}
	
    function obj2arr($obj){	
		if (is_array($obj)){
			$arrayObjetos = array();
			foreach($obj as $indice => $conteudo){
				array_push($arrayObjetos,get_object_vars($conteudo));
			}
			return $arrayObjetos;
		} else {
            return get_object_vars($ob); //retorna array associativa
        }
    }
	
	/**
	 * 
	 * @param String $texto
	 * @return String
	 */
	function limitText($texto, $limite = 20){
		if (strlen($texto) > $limite)
			return substr($texto, 0, $limite) . '...';
		else
			return $texto;
	}
	
	function cleanUrlSpaces($url){
		return preg_replace("%20", " ", $url);
	}
		
	function canonizar($string) {
		$string	=	strtolower($string);
		$string	=	trim($string);
		$regexps	=	array(	0	=>	'/ /',
								1	=>	'/(á|à|ã|â|ä|Á|À|Ã|Â|Ä)/',
								2	=>	'/(é|è|ẽ|ê|ë|É|È|Ẽ|Ê|Ë)/',
								3	=>	'/(í|ì|ĩ|î|ï|Í|Ì|Ĩ|Î|Ï)/',
								4	=>	'/(ó|ò|õ|ô|ö|Ó|Ò|Õ|Ô|Ö)/',
								5	=>	'/(ú|ù|ũ|û|ü|Ú|Ù|Ũ|Û|Ü)/',
								6	=>	'/(ç|Ç)/');
		
		$replaces 	=	array(	0	=>	'-',
								1	=>	'a',
								2	=>	'e',
								3	=>	'i',
								4	=>	'o',
								5	=>	'u',
								6	=>	'c');
		$string	=	preg_replace($regexps, $replaces, $string);
		return $string;
	}
	
	function codificaStringBusca($string) {
		$regexps	=	array(	0	=>	'/\//',
								1	=>	'/a/',
								2	=>	'/e/',
								3	=>	'/i/',
								4	=>	'/o/',
								5	=>	'/u/',
								6	=>	'/c/');
		
		$replaces	=	array(	0	=>	'',
								1	=>	'(a|á|à|ã|â|ä)',
								2	=>	'(e|é|è|ẽ|ê|ë)',
								3	=>	'(i|í|ì|ĩ|î|ï)',
								4	=>	'(o|ó|ò|õ|ô|ö)',
								5	=>	'(u|ú|ù|ũ|û|ü)',
								6	=>	'(c|ç)');
		
		$string	=	preg_replace($regexps, $replaces, $string);
		return	$string;
	}
	
	function configuraRegexpStringBusca($string, $tabela) {
		$strQuery	=	"";
		
		$arrayString	=	$string != null ? explode('"', stripslashes($string)) : array();
		foreach ($arrayString as $chave => $string1) {
			if ($chave % 2 == 0) {
				if ($string1 != '') {
					$arrayStringFora	=	explode(' ', $string1);
					foreach ($arrayStringFora as $string2) {
						$strQuery	.=	$tabela . ' REGEXP ".*' . $string2 . '.*" AND ';
					}
				}	
			}
			else {
				if ($string1 != '') {
					$strQuery	.=	$tabela . ' REGEXP ".*' . $string1 . '.*" AND ';
				}
			}
		}
		
		return $strQuery;
	}
}
?>
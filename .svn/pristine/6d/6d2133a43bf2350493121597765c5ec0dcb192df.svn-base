<?php
class Validation{
		
	public function emptyFields($array, $testList = null)
	{
		$arrVazios = array();
		
		if(!isset($testList))
		{
			foreach($array as $index => $value)
			{
				if(empty($valor)) array_push($arrVazios, $value);
			}
		} 
		else
		{
			foreach($testList as $value)
			{
				if(empty($array[$value])) array_push($arrVazios, $value);
			}
		}
		
		if(count($arrVazios) > 0)	return $arrVazios;
		else 						return false;
	}

	public function numeric($numero, $tamanho=false, $comparacao='='){
		if ($tamanho){
			if ($comparacao	==	'<='){
				if(!(strlen($numero) <= $tamanho)){
					return false;
				}
			}
			else{
				if($comparacao	==	'>='){
					if(!(strlen($numero) >= $tamanho)){
						return false;
					}
				}
				else{
					if(!(strlen($numero) == $tamanho)){
						return false;
					}
				}
			}
		}
		if(is_numeric($numero) && $numero >= 0){
			return true;
		}
		else{
			return false;
		}
	}
	
	//TODO com certeda tem uma forma melhor de validar datas!
	
	/**
	 * Verifica se uma data e valida
	 * @return bool
	 * @param int $dia
	 * @param int $mes
	 * @param int $ano
	 */
	public function dateArr($dia, $mes, $ano) 
	{
		if ($this->year($ano) && $this->month($mes) && $this->day($dia))
		{
			if ($mes == 2)
			{
				if ($ano%100 == 0)
				{
					$ano = $ano/100;
				}
				if ($ano%4 == 0){
					if ($dia <= 29)
					{
						return true;
					}
					else
					{
						return false;
					}
				}
				else
				{
					if ($dia <= 28)
					{
						return true;
					}
					else
					{
						return false;
					}
				}
				
			}
			elseif($mes == 1 || $mes == 3 || $mes == 5 || $mes == 7 || $mes == 8 || $mes == 10 || $mes == 12 )
			{
					return true;
			}
			else
			{
				if ($dia <= 30)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Valida uma data em formato String em formato banco de dados.
	 * @return bool
	 * @param string $data
	 * @param string $formato "BD", "BR", "EN"
	 */
	public function date($data, $formato = "BR") {
		if($formato == "BD") {
			$data	=	explode('-', $data);
			if (sizeof($data) != 3) return false;
			return self::dataSeparada($data[2], $data[1], $data[0]);
		} else{
			$data	=	explode('/', $data);
			if (sizeof($data) != 3) return false;
			if ($formato == "BR") return self::dataSeparada($data[0], $data[1], $data[2]);
			if ($formato == "EN") return self::dataSeparada($data[1], $data[0], $data[2]);
		}
		return false;
	}
	
	/**
	 * Verifica se o ano é um número entre 0 e 2100.
	 * @return bool
	 * @param int $ano
	 */
	public function year($ano) {
		if(self::numero($ano, 4)){
			if ($ano >= 0 && $ano <= 2100){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
		
	}
	
	/**
	 * Verifica se o mes é um número entre 1 e 12
	 * @return bool
	 * @param int $mes
	 */
	public function month($mes) {
		if (self::numero($mes, 2, '<=')){
			if ($mes >= 1 && $mes <= 12){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}	
	}
	
	/**
	 * Verifica se o dia e um numero entre 1 e 31.
	 * @return bool
	 * @param int $dia
	 */
	public function day($dia) {
		if (self::numero($dia, 2, '<=')){
			if ($dia >=1 && $dia <=31){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
		
	}
	
	
	//TODO com certeza tem forma melhor de fazer essa comparação de datas!!
	
	//TODO Mudar essas funções que aceitam a string separada para testar se a entrada é um array ou não e juntar ambas em uma só função
	
	/**
     * Compara duas datas, retorna 1 se a segunda for maior, -1 se for menor e 0 se forem iguais.
     * @return int
     * @param int $dia1
     * @param int $mes1
     * @param int $ano1
     * @param int $dia2
     * @param int $mes2
     * @param int $ano2
     */
	public function dateCompairArr($dia1, $mes1, $ano1, $dia2, $mes2, $ano2) {
		if ($ano2 > $ano1) {
			return 1;
		}
		if ($ano2 < $ano1) {
			return -1;
		}
		else {
			if ($mes2 > $mes1) {
				return 1;
			}
			if ($mes2 < $mes1) {
				return -1;
			}
			else {
				if ($dia2 > $dia1) {
					return 1;
				}
				if ($dia2 < $dia1) {
                  return -1;
				}
				else {
				return 0;
				}
			}
		}
    }
	
	/**
     * Compara duas datas, retorna 1 se a segunda for maior, -1 se for menor e 0 se forem iguais.
     * @return int
     * @param string $data1
     * @param string $data2
     */
	public function dateCompair($data1, $data2){
		$data1 		=	explode('-', $data1);
		$data2 		=	explode('-', $data2);
		return $this->dateCompairArr($data1[2], $data1[1], $data1[0], $data2[2], $data2[1], $data2[0]);
	}
	
	
	public function url($string, $limite=false) {
		 /*
         * Expressao regular de valores alfabeticos.
         */
        $listaValores    =    "/^[a-z0-9]+[a-z0-9\-]$/";
       
        if (!$limite) {
            if (preg_match($listaValores, $string)) {
                return    true;
            }
            else {
                return    false;
            }
        }
        else {
            if (strlen($string) <= $limite) {
                if (preg_match($listaValores, $string)) {
                    return    true;
                }
                else {
                    return    false;
                }
            }
            else {
                return    false;
            }
        }
	}
	
	public function externalUrl($url) {
		//Retirado de http://phpcentral.com/208-url-validation-in-php.html
		//$urlRegex = "^(https?|ftp)\:\/\/";
		$urlRegex = "/^(https?)\:\/\/"; //Nao permitir ftp

		// USER AND PASS (optional)
		//$urlRegex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?";

		// HOSTNAME OR IP
		$urlRegex .= "[a-zA-Z0-9+\$_-]+(\.[a-z0-9+\$_-]+)*"; // http://x = allowed (ex. http://localhost, http://routerlogin)
		//$urlRegex .= "[a-z0-9+\$_-]+(\.[a-z0-9+\$_-]+)+"; // http://x.x = minimum
		//$urlRegex .= "([a-z0-9+\$_-]+\.)*[a-z0-9+\$_-]{2,3}"; // http://x.xx(x) = minimum
		//use only one of the above

		// PORT (optional)
		$urlRegex .= "(\:[0-9]{2,5})?";
		// PATH (optional)
		$urlRegex .= "(\/([a-zA-Z0-9+\$_-]\.?)+)*\/?";
		// GET Query (optional)
		$urlRegex .= "(\?[a-zA-Z+&\$_.-][a-z0-9;:@\/\&%=+\$_.-]*)?";
		// ANCHOR (optional)
		$urlRegex .= "(#[a-zA-Z_.-][a-z0-9+\$_.-]*)?\$/";

		return (preg_match($urlRegex, $url));
	}
	
	/**
     * Verifica se uma determinada string possui SOMENTE valores alfabeticos (de a a z e de A a Z) ou espacos e se seu tamanho e menor ou igual ao limite passado. Se nenhum limite for passado, nao verifica o tamanho da string.
     * @return bool
     * @param string $string String que sera avaliada.
     * @param int $limite[optional] Tamanho limite da string.
     */
    public function alphabetic($string, $limite=false) {  
        /*
         * Expressao regular de valores alfabeticos.
         */
        $listaValores    =    "/^[a-zA-ZáàãâéèêíìîóòôõúùûüçÁÀÃÂÉÈÊÍÌÎÓÒÔÕÚÙÛÇ]+[a-zA-Z áàãâéèêíìîóòôõúùûüçÁÀÃÂÉÈÊÍÌÎÓÒÔÕÚÙÛÇ]*$/";
       
        if (!$limite) {
            if (preg_match($listaValores, $string)) {
                return    true;
            }
            else {
                return    false;
            }
        }
        else {
            if (strlen($string) <= $limite) {
                if (preg_match($listaValores, $string)) {
                    return    true;
                }
                else {
                    return    false;
                }
            }
            else {
                return    false;
            }
        }
    }
   
    /**
     * Verifica se uma determinada string possui valores alfanumericos (de a a z e de A a Z e numeros) ou espacos, virgulas, pontos, dois pontos, tracos, parenteses, interrogacoes, exclamacoes ou underscores e se seu tamanho e menor ou igual ao limite passado. Se nenhum limite for passado, nao verifica o tamanho da string.
     * @return bool
     * @param string $string String que sera avaliada.
     * @param int $limite[optional] Tamanho limite da string.
     */
    public function alphanumeric($string, $limite=false) {
        /*
         * Expressao regular de valores alfa-numericos.
         */
        $listaValores    =    "/^[a-zA-Z áàãâéèêíìîóòôõúùûüçÁÀÃÂÉÈÊÍÌÎÓÒÔÕÚÙÛÇ\d\´\'\,\.\:\-\(\)\?\!_\/\r\n]+$/";
       
        if (!$limite) {
            if (preg_match($listaValores, $string)) {
                return    true;
            }
            else {
                return    false;
            }
        }
        else {
            if (strlen($string) <= $limite) {
                if (preg_match($listaValores, $string)) {
                    return    true;
                }
                else {
                    return    false;
                }
            }
            else {
                return    false;;
            }
        }
	}
	
	/**
	 * Verifica se o e-mail é da forma email@email[.com]*
	 * @return bool
	 * @param string $email
	 */
	public function email($email) {
		$listaValores	=	'/^[a-zA-Z0-9_\-\.]{3,}@[a-zA-Z1-9_\-]+(\.[a-zA-Z1-9_\-]+)+$/';
		if (strlen($email)	<=	TAM_EMAIL_USUARIO){
			return preg_match($listaValores, $email);
		}
		else{
			return false;
		}
		
	}
	
	/**
	 * Verififica se o nome do arquivo da foto e valido e se a extensao dos arquivos de foto e jpg, jpeg, gif, png ou bmp.
	 * @return bool
	 * @param string $nomeArquivo
	 */
	public function photo($nomeArquivo){
		$listaValores    =    "/^[a-zA-ZáàãâéèêíìîóòôõúùûüçÁÀÃÂÉÈÊÍÌÎÓÒÔÕÚÙÛÇ\d\.\-_ ]+\.(jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG)$/";
		
		return preg_match($listaValores, $nomeArquivo);
	}
	
	/**
	 * Verifica se a Senha não contem nenhum aspas(") ou plique(') e se tem pelo menos 4 caracteres.
	 * @return bool
	 * @param string $senha
	 */
	public function password($senha, $tamMinimo = null, $tamMaximo = null){
		$tamMinimo = $tamMinimo == null ? TAM_MINIMO_SENHA : $tamMinimo;
		$tamMaximo = $tamMaximo == null ? TAM_MAXIMO_SENHA : $tamMaximo;
		
		$listaValores	=	"/^[^\"']{3,}$/"; //o tamanho mínimo possível será 3.

		if(strlen($senha) >= $tamMinimo && strlen($senha) <= $tamMaximo){
			return preg_match($listaValores, $senha);
		}
		else{
			return false;
		}
	}
	
	/**
	 * Valida cpf fazendo calculos nescessários
	 * @param object $cpf
	 * @return 
	 */
	public function cpf($cpf)
	{	// Verifica se o número digitado contém todos os digitos
		$cpf = str_pad(preg_replace('/[^0-9_]/', '', $cpf), 11, '0', STR_PAD_LEFT);
		
		// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
	    if (strlen($cpf) != 11 	|| $cpf == '00000000000' || $cpf == '11111111111' 
								|| $cpf == '22222222222' || $cpf == '33333333333' 
								|| $cpf == '44444444444' || $cpf == '55555555555' 
								|| $cpf == '66666666666' || $cpf == '77777777777' 
								|| $cpf == '88888888888' || $cpf == '99999999999' ) {
		return false;
	    }
		// Calcula os números para verificar se o CPF é verdadeiro
		else {
	        for ($t = 9; $t < 11; $t++) {
	            for ($d = 0, $c = 0; $c < $t; $c++) {
	                $d += $cpf{$c} * (($t + 1) - $c);
	            }
	
	            $d = ((10 * $d) % 11) % 10;
	
	            if ($cpf{$c} != $d) {
	                return false;
	            }
	        }
	
	        return true;
	    }
	}
	
	public static function rg($value){
		if(preg_match('@^([0-9]{2}.[0-9]{3}.[0-9]{3}-[0-9])$@', $value) == 0) {
			return false;
		}
		else {
			return true;
		}
	}
}
?>
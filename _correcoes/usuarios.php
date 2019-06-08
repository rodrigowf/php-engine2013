<?php

class Usuarios extends appModel 
{
	$validation = array(
				"primeiro_nome" => array("rule" => "not_empty", "msg" => "Can't be empty"),
				"sobrenome" => array("rule" => "not_empty", "msg" => "Can't be empty"),
				"login" => array("rule" => "not_empty", "msg" => "Can't be empty"),
				"password" => array("rule" => "not_empty", "msg" => "Can't be empty"),
				"email" => array("rule" => "is_email", "msg" => "Can't be empty"),
				"niver_mes" => array("rule" => "is_numeric", "msg" => "Invalid Date"),
				"niver_dia" => array("rule" => "is_numeric", "msg" => "Invalid Date"),
				"niver_ano" => array("rule" => "is_numeric", "msg" => "Invalid Date"),
				"idioma" => array("rule" => "not_empty", "msg" => "Can't be empty"),
				"pais" => array("rule" => "not_empty", "msg" => "Can't be empty"),
                "cpf_passaporte" => array("rule" => "not_empty", "msg" => "Can't be empty"),
				"estado" => array("rule" => "not_empty", "msg" => "Can't be empty"),
				"cidade" => array("rule" => "not_empty", "msg" => "Can't be empty"),
				"endereco" => array("rule" => "not_empty", "msg" => "Can't be empty"),
                "telefone" => array("rule" => "is_numeric", "msg" => "Just Numbers and not empty"),
				"nome_ej" => array("rule" => "not_empty", "msg" => "Can't be empty"),
				"federacao_ej" => array("rule" => "not_empty", "msg" => "Can't be empty"),
				"pais" => array("rule" => "not_empty", "msg" => "Can't be empty"),
				"cargo" => array("rule" => "not_empty", "msg" => "Can't be empty"),
                "tempoMej" => array("rule" => "not_empty", "msg" => "Can't be empty"),
                "tamanho" => array("rule" => "not_empty", "msg" => "Can't be empty"),
                "instituicao" => array("rule" => "not_empty", "msg" => "Can't be empty"),
				"sexo" => array("rule" => "is_checked", "msg" => "What is your sex?"),
				"agree" => array("rule" => "is_checked", "msg" => "The Term of Commitment Must Be Accepeted."),
			);
	
	//TODO tirar chamada de validate da função de inserção	
	function validate(){
			$msgValida = array();
			
			//checando se as senhas conferem
			
			if($this->data['usuarios']['password'] != $this->data['usuarios']['password_check']){
				$msgValida['senha_check'] = "The passwords doesnt match";
			}
			
			// limpa o checkbox do termo para a validação automática
            if(!isset($this->data['usuarios']['agree'])) $this->data['usuarios']['agree'] = NULL;
			
			// faz a validação
			parent::validate($this->data['usuarios']);
			$a = $this->validationErrors;
			
			//checa se o login já existe
            if(!empty($this->data['usuarios']['login']) && $this->usuarios->checkExistence('login',$this->data['usuarios']['login'],'usuarios')){
                $msgValida['login_check'] = "Esse login já está sendo utilizado";
            }
			
			//checa se o email já está cadastrado
            if(!empty($this->data['usuarios']['email']) && $this->usuarios->checkExistence('email',$this->data['usuarios']['email'],'usuarios')){
                $msgValida['email_check'] = "Esse email já está sendo utilizado";
            }
			
			//valida a data de nascimento
            if((int) $this->data['usuarios']['niver_mes'] >= 12 || (int) $this->data['usuarios']['niver_dia'] >= 31 || (int) $this->data['usuarios']['niver_ano'] >= 2012)  $msgValida['dataPadrao'] = "Date out of pattern";
			
				
			if(is_array($a) || !empty($msgValida) )
			{
                if(isset($msgValida['senha_check'])) $a['password_check'] = $msgValida['senha_check'];
                if(isset($msgValida['login_check'])) $a['login_check'] = $msgValida['login_check'];
                if(isset($msgValida['email_check'])) $a['email_check'] = $msgValida['email_check'];
                if(isset($msgValida['agree'])) $a['agree'] = $msgValida['agree'];
                if(isset($msgValida['dataPadrao'])) $a['dataPadrao'] = $msgValida['dataPadrao'];

                $this->set('dados',$this->data['usuarios']);
                $this->set("validacao", $a);

            } else 
            {
				unset($this->data['usuarios']['password_check']);
				$this->data['usuarios']['nascimento'] = $this->data['usuarios']['niver_ano'] .'-'.$this->data['usuarios']['niver_mes'].'-'.$this->data['usuarios']['niver_dia'];
				unset($this->data['usuarios']['niver_mes']);
				nset($this->data['usuarios']['niver_dia']);
				unset($this->data['usuarios']['niver_ano']);
				unset($this->data['usuarios']['agree']);
				
				if($this->data['usuarios']['federacao_ej'] == "other_outros_ej") $this->data['usuarios']['blFederada'] = 0;
				lse $this->data['usuarios']['blFederada'] = 1;
				
				
				if($this->data['usuarios']['outros_ej'] == '') unset($this->data['usuarios']['outros_ej']);
				else 
				{
					$this->data['usuarios']['federacao_ej'];
					//unset($this->data['usuarios']['outros_ej']);
				}
			
		parent::validate();
	}
	
}
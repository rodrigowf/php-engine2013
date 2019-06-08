<?php
	require_once('RegrasValidacao.php');
	class Validador
	{
			//validacao > campos > criterios > regra e mensagem de erro
			public $validacaoPadrao = array(
				'nome' => array(
					'notEmpty' => array(
						'rule' => 'notEmpty',
						'message' => 'O campo nome não pode estar vazio'
					)
				),
				'login' => array(
					'notEmpty' => array(
						'rule' => 'notEmpty',
						'message' => 'O campo login não pode estar vazio'
					)
				),
				'confirmaSenha' => array(
					'notEmpty' => array(
						'rule' => 'notEmpty',
						'message' => 'O campo de co	firmar senha não pode estar vazio'
					)
				),
				'senha' => array(
					'notEmpty' => array(
						'rule' => 'notEmpty',
						'message' => 'O campo senha não pode estar vazio'
					),
					'compara' => array(
						'rule' => array(
							'param' => 'confirmaSenha'
						),
						'message' => 'O campo senha e confirma senha tem que ser iguais'
					)
				),
				'confirmaEmail' => array(
					'notEmpty' => array(
						'rule' => 'notEmpty',
						'message' => 'O campo confirma email não pode estar vazio'
					)
				),
				'email' => array(
					'notEmpty' => array(
						'rule' => 'notEmpty',
						'message' => 'O campo email não pode estar vazio'
					),
					'email' => array(
						'rule' => 'email',
						'message' => 'Não é um e-mail válido'
					),
					'compara' => array(
						'rule' => array(
							'param' => 'confirmaEmail'
						),
						'message' => 'O campo email e confirma email tem que ser iguais'
					)
				)
				
			);
			private $validacaoCustomizada = array();
			
			//Função de Validação valida de acordo com o array de validação e os dados passados por parametro
			public function valida($data, $validacao) {
				$erro = array();
				foreach($validacao as $index => $name) {
					if(isset($data[$index])) {
						$field = $data[$index];
						
						foreach($name as $criterion) {
							if(is_array($criterion['rule'])) {
								$compara = $criterion['rule'];
								if(isset($data[$compara['param']]))
								{
									if( !isset($erro[$compara['param']]) ){
										if(!(call_user_func('compara', $field ,$data[$compara['param']]))) {
											$erro[$index] = $criterion['message'];
											break;
										}
									}
								}
							} else {
								if(!(call_user_func($criterion['rule'], $field))) {
									$erro[$index] = $criterion['message'];
									break;
								}
							}
						}
					}
				}
				
				return $erro;
			}
			public function validaPadrao($data)
			{
				return $this->valida($data, $this->validacaoPadrao);
			}
			public function validaCustomizado($data)
			{
				return $this->valida($data, $this->validacaoCustomizada);
			}
			//validacao > campos > criterios > regra e mensagem de erro
			public function criaValidacaoCampo($nome, $criteriosCampos) //criterios tem o nome da validação e a mensagem de erro
			{
				$criterios = array();
				
				foreach($criteriosCampos as $criterioNome => $criterioMensagem)
				{
					$criterios[$criterioNome] = array(
						'rule' =>	$criterioNome ,
						'message' => $criterioMensagem
						);
				}
				$this->validacaoCustomizada[$nome] = $criterios;
			}
	}
?>
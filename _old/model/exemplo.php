<?php

class Noticias extends appModel 
{
	
	//Esse é o padrão de array de validação do cake. Eu não entendi muito bem porque ele é assim. 
	//TODO Tentem entender porque é assim e implementar uma validação automática que testa por esse array
	var $validate = array(
		'nomeCampo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nomeOutroCampo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

    public function fazAlgumaCoisaNoBD() //Isso é só um exemplo!!
	{
		$minhaQuery = "SELECT BLA";
		
		$db = $this->getDB();
		
		$db->query($minhaQuery);
	}


}
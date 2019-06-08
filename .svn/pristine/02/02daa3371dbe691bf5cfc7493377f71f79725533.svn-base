<?php

class Cases extends AppModel
{
    public function valida($nada, $a)
    {
        $title = $this->read("titulo",$a['titulo']);

        if($title)
        {
            return "duplo";
        }

        $validacao = array(
            "titulo" => array("rule" => "not_empty", "msg" => "Can&rsquo;t be empty"),
            "idiomas" => array("rule" => "not_empty", "msg" => "Can&rsquo;t be empty"),
            "tema" => array("rule" => "not_empty", "msg" => "Can&rsquo;t be empty"),
            "assunto" => array("rule" => "not_empty", "msg" => "Can&rsquo;t be empty"),
            "org_name" => array("rule" => "not_empty", "msg" => "Can&rsquo;t be empty"),
            "pais" => array("rule" => "not_empty", "msg" => "Can&rsquo;t be empty"),
            "org_estado" => array("rule" => "not_empty", "msg" => "Can&rsquo;t be empty"),
            "org_cidade" => array("rule" => "not_empty", "msg" => "Can&rsquo;t be empty"),
            "org_phone" => array("rule" => "is_numeric", "msg" => "Just Numbers and not empty"),
            "org_mail" => array("rule" => "is_email", "msg" => "Must be a valid e-mail"),
            "nome_autor" => array("rule" => "not_empty", "msg" => "Can&rsquo;t be empty"),
            "autor_phone" => array("rule" => "is_numeric", "msg" => "Just Numbers and not empty"),
            "autor_mail" => array("rule" => "is_email", "msg" => "Must be a valid e-mail"),
            "nome_apresentador1" => array("rule" => "not_empty", "msg" => "Can&rsquo;t be empty"),
            "apresentador1_phone" => array("rule" => "is_numeric", "msg" => "Just Numbers and not empty"),
            "apresentador1_mail" => array("rule" => "is_email", "msg" => "Must be a valid e-mail"),
            "agree" => array("rule" => "is_checked", "msg" => "The Term of Commitment Must Be Accepted."),
        );

        if(isset($a['nome_apresentador2'])||((isset($a['apresentador2_phone'])||(isset($a['apresentador2_mail'])))))
        {
            $validacao = array_merge($validacao, array(
                "nome_apresentador2" => array("rule" => "not_empty", "msg" => "Can&rsquo;t be empty"),
                "apresentador2_phone" => array("rule" => "is_numeric", "msg" => "Just Numbers and not empty"),
                "apresentador2_mail" => array("rule" => "is_email", "msg" => "Must be a valid e-mail"),
            ));
        }

        if(!isset($a['agree']))		$a['agree'] 	= NULL;
        if(!isset($a['idiomas']))	$a['idiomas'] 	= NULL;
        if(!isset($a['tema']))		$a['tema'] 		= NULL;
        if(!isset($a['pais']))		$a['pais'] 		= NULL;

        return parent::valida($validacao, $a);
    }

    public function insert($a)
    {
    	//tratamento dos dados
        unset($a['cases']['agree']);
        
        //inserção
        return parent::insert($a);

    }

}


?>
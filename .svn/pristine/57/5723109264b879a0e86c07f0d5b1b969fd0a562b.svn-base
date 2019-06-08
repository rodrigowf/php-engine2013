<?php

class Usuarios extends AppModel
{
    static $table_name = 'usuarios';
    static $primary_key = 'id';

	var $fields = array
	(
		'nome'		    => array( 'text', 'required', 'maxlenght_255' ),
		'email'		    => array( 'email', 'required', 'maxlenght_255' ),
		'telefone'	    => array( 'tel', 'required' ),
		'login'		    => array( 'text', 'required', 'maxlenght_255', 'unique' ),
		'foto'		    => array( 'file', 'maxsize_1024' ),

		'senha'			=> array( 'password', 'required', 'alphanum', 'maxlenght_18', 'minlenght_4' ),
		'user_level'	=> array( 'user_level', 'required', 'alphanum', 'maxlenght_18', 'minlenght_4' ),
		'nome'			=> array( 'text', 'maxlenght_255', 'required' ),
		'curso'			=> array( 'text', 'maxlenght_255', 'required' ),
		'dre'			=> array( 'numeric', 'maxlenght_255', 'required' ),
		'ingresso'		=> array( 'datetime', 'required' ),
		'facebook'		=> array( 'text', 'maxlenght_255', 'required' ),
		'email_poli'	=> array( 'email', 'required', 'maxlenght_255' ),
		'email_pessoal'	=> array( 'email', 'required', 'maxlenght_255' ),
		'telefone_br'	=> array( 'tel', 'required' ),

		'telefone_ext' 		=> array( 'tel' ),
		'contato_br'		=> array( 'text', 'maxlenght_255' ),
		'tel_contato_br'	=> array( 'tel' ),
		'partida'			=> array( 'datetime'),
		'retorno'			=> array( 'datetime' ),

		'modalidade'        =>array( 'text' ),
        'disciplinas'       =>array( 'textarea' ),
        'estagio'           =>array( 'textarea' ),

		'destino_escola'	=> array( 'text', 'maxlenght_255', 'required' ),

		'realtorio_estagio'		=> array( 'file', 'maxsize_1024' ),
		'realtorio_intercambio'	=> array( 'file', 'maxsize_1024' ),
	);

    var $has_many = array
    (
        array('disciplinasCursadas'),
        array('equivalencias', 'through' => 'equivalenciasSolicitadas')
    );

    var $has_one = array
    (
        array('programas'),
        array('bolsas'),
        array('destinos')

    );
}
	
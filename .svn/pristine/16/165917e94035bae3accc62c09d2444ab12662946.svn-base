<?php

class Noticias extends appModel
{



	//Só escreva aqui funções que fazem coisas que o model já não faz automaticamente!
	
    public function fazAlgumaCoisaNoBD() //Isso é só um exemplo!!
	{
		$minhaQuery = "SELECT n.strTitulo as title FROM noticias n where n.idNoticia=1;";
		
		$db = $this->getDB();
		
		$db->query($minhaQuery);

        debug($db);
	}


    public function traduz_HTML ($lista){


        foreach ($lista as $noticia){

            $date = $noticia['noticias']['Data'];
            $newDate = $this->dataNormal($date);
            $noticia['noticias']['Data'] = $newDate;

            $titleTrad = html_entity_decode($noticia['noticias']['Titulo'],ENT_QUOTES,'UTF-8');
            $noticia['noticias']['Titulo'] = $titleTrad;

            $resTrad = html_entity_decode($noticia['noticias']['Resumo'],ENT_QUOTES,'UTF-8');
            $noticia['noticias']['Resumo'] = $resTrad;

            $textTrad = html_entity_decode($noticia['noticias']['Texto'],ENT_QUOTES,'UTF-8');
            $noticia['noticias']['Texto'] = $textTrad;


            $newLista[]=$noticia;

        }

        return $newLista;


    }

    public function traduz_HTML_only ($noticia){

        $date = $noticia['noticias']['Data'];
        $newDate = $this->dataNormal($date);
        $noticia['noticias']['Data'] = $newDate;

        $titleTrad = html_entity_decode($noticia['noticias']['Titulo'],ENT_QUOTES,'UTF-8');
        $noticia['noticias']['Titulo'] = $titleTrad;

        $resTrad = html_entity_decode($noticia['noticias']['Resumo'],ENT_QUOTES,'UTF-8');
        $noticia['noticias']['Resumo'] = $resTrad;

        $textTrad = html_entity_decode($noticia['noticias']['Texto'],ENT_QUOTES,'UTF-8');
        $noticia['noticias']['Texto'] = $textTrad;

        return $noticia;


    }
}
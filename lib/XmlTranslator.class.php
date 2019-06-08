<?php
/**
 * Classe criada para buscar a tradução para determinada string a partir de um documento .xml
 * Funções retiradas daqui: http://www.smarty.net/forums/viewtopic.php?t=84
 * 
 * Padrão de xml:
	<?xml version="1.0" encoding="utf-8" ?> 
	<locale lang="de"> 
	   <header> 
	      <project>Project Name</project> 
	      <create>2003-01-12 17:24-0500</create> 
	      <revise>2003-01-15 19:15-0500</revise> 
	      <trans>Your Name - Your Email</trans> 
	      <lang>Deutsch</lang> 
	   </header> 
	   <message> 
	      <id>Hello</id> 
	      <string>Guten Tag</string> 
	   </message> 
	   <message> 
	      <id>%u: How are you?</id> 
	      <string>%u: Wie gates es Ihnen?</string> 
	   </message> 
	</locale>
 */
Class XmlTranslator 
{
	private $lang;						//shortname da lingua - o mesmo nome do arquivo xml!!
	private $localePath = APP_LOCALE;	//local aonde ficam os arquivos de lingua
	private $xml;						//variável local que armazenará o xml em forma de array
	
	public function __construct($defaultLang)
	{
		$this->lang = &$_SESSION['_TRANSLATOR']['_LANG'];
		$this->xml 	= &$_SESSION['_TRANSLATOR']['_PARSEDXML'];
		
		if(empty($this->lang))
		{
			$this->setLang($defaultLang);
		}
	}
		
	public function setLang($lang)
	{
		if($this->lang != $lang) 
		{
			$path = $this->localePath . $lang . ".xml";
			
			if ( file_exists($path) )
			{
				$this->lang = $lang;
				$this->xml = $this->getXmlTree($path);
			}
			else 
			{
				trigger_error("O idioma requisitado não foi encontrado! $path não existe.", E_USER_WARNING);
				return false;
			}
			
			return true;
		}
		else 
		{
			return true;
		}
		
	}
	
	public function getLang()
	{
		return $this->lang;
	}
	
	public function translate($string, $args = array()) 
	{
		//se não tiver xml nenhum só sai e retorna a string original com os args substituidos
		if ( empty($this->xml) ) 
		{
			return strtr($string, $args);
		}
		
		//busca no xml e retorna o resultado encontrado
		foreach ( $this->xml[0]['children'] as $tag ) 
		{
			if ( $tag['tag'] == "MESSAGE" ) 
			{
				if ( $tag['children'][0]['value'] == $string ) 
				{
					if ( $tag['children'][1]['value'] != "" ) 
					{
						return strtr($tag['children'][1]['value'], $args);
					}
				}
			}
		}
		
		//se não encontrar nenhuma correspondencia no xml retorna a própria string
		return strtr($string, $args);
	}

	private function getChildren($vals, &$i) 
	{
		$children = array();

		if ( !isset($vals[$i]['attributes']) ) 
		{
			$vals[$i]['attributes'] = "";
		}

		while ( ++$i < count($vals) ) 
		{
			if ( !isset($vals[$i]['attributes']) ) 
			{
				$vals[$i]['attributes'] = "";
			}

			if ( !isset($vals[$i]['value']) ) 
			{
				$vals[$i]['value'] = "";
			}

			switch ( $vals[$i]['type'] ) 
			{
				case 'complete' :
					array_push($children, array('tag' => $vals[$i]['tag'], 'attributes' => $vals[$i]['attributes'], 'value' => $vals[$i]['value']));
					break;
				case 'open' :
					array_push($children, array('tag' => $vals[$i]['tag'], 'attributes' => $vals[$i]['attributes'], 'children' => $this->getChildren($vals, $i)));
					break;
				case 'close' :
					return $children;
					break;
			}
		}

		return $children;
	}

	private function getXmlTree($file) 
	{
		$data = implode("", file($file));
		$xml = xml_parser_create();
		
		xml_parser_set_option($xml, XML_OPTION_SKIP_WHITE, 1);
		xml_parse_into_struct($xml, $data, $vals, $index);
		xml_parser_free($xml);

		$tree = array();
		$i = 0;
		array_push($tree, array('tag' => $vals[$i]['tag'], 'attributes' => $vals[$i]['attributes'], 'children' => $this->getChildren($vals, $i)));

		return $tree;
	}

}

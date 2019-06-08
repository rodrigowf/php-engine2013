<?php
/**
 * TODO INCOMPLETO file.class
 * 
 */
Class File {
	
	public $name;
	public $type;
	public $size;
	public $upName;
	
	public $info;
	
	//restrições:
	public $allowedExtensions;
	public $maxSize;
	
	//padrões:
	public $diretorio;
	
	public function __construct(){
		
	}
	
	public static function getUploaded(){
	
	}

	/**
	 * Coloca o objeto upado no banco e no sistema de arquivos
	 * @param nome_campo O valor do name do input type="file" a ter os seus arquivos a ser inseridos
	 * @param $diretorio Um caminho a partir do diret�rio raiz do projeto para inserir os arquivos, se n�o passado nada, o pr�prio diret�rio raiz do projeto ser� usado
	 * @return Retorna null em caso do array $_FILES n�o ter as informa��es necess�rias, uma mensagem de erro em caso de erro ao inserir um arquivo, ou true em caso de sucesso 
	 */
	public function upload($fieldName,$diretorio = null)
	{
		GLOBAL $diretorioRaiz;
		
		$diretorio = (isset($diretorio)) ? "$diretorioRaiz/$diretorio" : $diretorioRaiz;
		
		if(empty($_FILES))	{
			return null;
		}
		
		$arquivos = $_FILES[$fieldName]; // O Array com as informa��es do arquivo
		
		/*Se foi enviado apenas um arquivo*/
		if(!is_array($arquivos['name'])){
			$arquivos['name'] = array($arquivos['name']);
			$arquivos['type'] = array($arquivos['type']);
			$arquivos['tmp_name'] = array($arquivos['tmp_name']);
			$arquivos['error'] = array($arquivos['error']);
			$arquivos['size'] = array($arquivos['size']);
		}
		
		//echo "<pre>"; print_r($arquivos); echo "</pre>"; 
		
		for($index = 0; $index < count($arquivos['name']); $index++)
		{
			$nome_completo = $arquivos['name'][$index]; // Pego o nome do arquivo
			
			if(trim($nome_completo) == ""){ // Se o arquivo for um nome vazio, para por aqui
				break;
			}
			
			if(!file_exists($diretorio)){  // Se o diret�rio n�o existe, cria
				mkdir($diretorio);
			}
			
			$novo_arquivo = "$diretorio/$nome_completo";
			
			/*Salva o novo arquivo*/
			if(!move_uploaded_file($arquivos['tmp_name'][$index], $novo_arquivo))
			{
				return "Falha ao salvar o arquivo passado em $novo_arquivo";
			}
			
		}
		
		return true;
	}	
	
	/**
	 * Fun��o auxiliar para validar cada arquivo de valida_arquivos
	 */
	public function valida($fieldName, $valida_campo_vazio, $extensoes, $mensagem_arquivo_vazio, $mensagem_erro_extensao, $mensagem_erro_tamanho)
	{
		if(trim($fieldName) == ""){ // Se o campo � vazio
			//TODO setar mensagem: n�o foi passado arquivo (ou parametro invalido)
			return false; // N�o validou
		}
		
		/*Pego a extens�o e o tamanho do arquivo passado*/
		$info = pathinfo($fieldName);
		$extensao_arquivo = $info['extension'];
		$tamanho_arquivo = (int)$_FILES[$fieldName]['size']; // Pego o tamanho do arquivo, garantindo que eu receba um inteiro
		
		/*Valido a extens�o e o tamanho do arquivo*/
		if(!in_array( strtolower($extensao_arquivo), $extensoes)) // Se o arquivo n�o possui uma extens�o v�lida
		{
			/*Cria a mensagem de erro caso n�o tenha sido passada*/
			$mensagem_erro_extensao = (isset($mensagem_erro_extensao)) ? $mensagem_erro_extensao : "O arquivo $nome_completo n�o possui uma extens�o v�lida";  
			return $mensagem_erro_extensao; // N�o validou
		}
		
		if($tamanho_arquivo > $max_file_size) // Se o arquivo tem um tamanho maior que o permitido
		{
			$max_file_size_em_KB = $max_file_size/1024; // Para exibir o erro melhor, eu transformo de bits para KB
			/*Cria a mensagem de erro caso n�o tenha sido passada*/
			$mensagem_erro_tamanho = (isset($mensagem_erro_tamanho)) ? $mensagem_erro_tamanho : "O arquivo $nome_completo � maior que os $max_file_size_em_KB KB permitidos";  
			return $mensagem_erro_tamanho; // N�o validou
		}

		return true;
	}

	/**
	 * Valida os arquivos de campos input type="file" de um formul�rio
	 * @param nome_campo O valor do name dos inputs type="file" a serem validados
	 * @param extensoes Um array de extensoes v�lidas para os arquivos
	 * @param $valida_campo_vazio Indica se � para validar o caso de n�o ter sido passado nenhum arquivo, com true validar� se foi passado um arquivo, com false n�o far� a valida��o e se n�o for passado nenhum arquivo retornar� true
	 * @param $max_file_size O valor em bits m�ximo para os arquivos
	 * @param $mensagem_arquivo_vazio Mensagem de erro caso n�o tenha sido passado nenhum arquivo
	 * @param $mensagem_erro_extensao Mensagem de erro caso a extens�o do arquivo seja inv�lida
	 * @param $mensagem_erro_tamanho Mensagem de erro caso o tamanho do arquivo passe o m�ximo permitido
	 * @return Retorna NULL em caso do array $_FILES n�o ter as informa��es necess�rias, uma mensagem de erro em caso de erro de valida��o, ou true em caso de sucesso 
	 */
	function valida_all($nome_campo,
							$extensoes = array('jpg', 'jpeg', 'bmp', 'png', 'gif', 'swf', 'mov', 'avi', 'wmv', 'flv','mp4'),
							$valida_campo_vazio = true,
							$max_file_size = 8388608,
							$mensagem_arquivo_vazio = null, $mensagem_erro_extensao = null, $mensagem_erro_tamanho = null)
	{
		
		if(empty($_FILES))	{ // Se o array $_FILES est� vazio e assim n�o tem como pegar os arquivos
			return NULL; // Indica Erro
		}
		
		$arquivos = $_FILES[$nome_campo];
		
		$erros = array(); // Guardar� os erros dos arquivos passados
		
		/*Se foi enviado apenas um arquivo*/
		if(!is_array($arquivos['name'])){
			$arquivos['name'] = array($arquivos['name']);
			$arquivos['type'] = array($arquivos['type']);
			$arquivos['tmp_name'] = array($arquivos['tmp_name']);
			$arquivos['error'] = array($arquivos['error']);
			$arquivos['size'] = array($arquivos['size']);
		}
		
		for($index = 0; $index < count($arquivos['name']); $index++)
		{
			/* Para funcionar $this->name deve valer o nome do input type="file" no formul�rio*/
			$nome_completo = $arquivos['name'][$index]; // Pego o nome do arquivo passado
			
			/*Coloca apenas mensagens e n�o valores boleanos*/
			if(($erro_validacao = valida_arquivo($nome_completo, $valida_campo_vazio, $extensoes,
			 									$mensagem_arquivo_vazio, $mensagem_erro_extensao, $mensagem_erro_tamanho)) !== true)
			{
				$erros[$index] = $erro_validacao;
			}
		}
		
		if(count($erros) == 1){ // Se s� for um erro
			return $erros[0]; // Retorna o �nico erro como uma string
		}
		
		return $erros;
				
	}
	
	
	/*Exclui todos os arquivos de um diret�rio*/
	function destroy($dir) {
	    $mydir = opendir($dir);
	    while(false !== ($file = readdir($mydir))) {
	        if($file != "." && $file != "..") {
	            chmod($dir.$file, 0777);
	            if(is_dir($dir.$file)) {
	                chdir('.');
	                destroy($dir.$file.'/');
	                rmdir($dir.$file) or DIE("couldn't delete $dir$file<br />");
	            }
	            else
	                unlink($dir.$file) or DIE("couldn't delete $dir$file<br />");
	        }
	    }
	    closedir($mydir);
	}
	
	/**
	 * Exclui um ou mais arquivos de um endere�o passado
	 * @param $nome_arquivos Um array com nomes de arquivo ou uma string com um �nico nome de arquivo. Se for passado o valor "*" significa que � para excluir todos os arquivos no diret�rio
	 * @param $diretorio Um caminho a partir do diret�rio raiz do projeto para excluir os arquivos, se n�o passado nada, o pr�prio diret�rio raiz do projeto ser� usado
	 * @param $excluir_diretorio Diz se o diret�rio tamb�m ser� exclu�do ou n�o
	 * @return Retorna uma mensagem de erro em caso de erro, ou true em caso de sucesso
	 */
	function exclui($nome_arquivos, $diretorio = null, $excluir_diretorio = false)
	{
		GLOBAL $diretorioRaiz;
		
		$diretorio = (isset($diretorio)) ? "$diretorioRaiz/$diretorio" : $diretorioRaiz;

		if($nome_arquivos == '*' || empty($nome_arquivos))
		{
			if(file_exists($diretorio))
			{
				destroy($diretorio.'/'); // O formato para deletar os diret�rios desse arquivo � com uma barra '/' no final
			} 
		}
		else
		{
			if(!is_array($nome_arquivos)){ // Se n�o for um array, transforma em um cujo �nico elemento � ele mesmo
				$nome_arquivos = array($nome_arquivos);
			}
			
			foreach($nome_arquivos as $index => $nome_arquivo)
			{
				$nome_completo = "$diretorio/$nome_arquivo";
				
				if(file_exists($nome_completo))
				{
					if(!unlink($nome_completo)){
						return "Erro ao deletar o arquivo $nome_completo";
					}
				}
			}
		}
		
		if($excluir_diretorio){
			if(!rmdir($diretorio)){
				return "Erro ao deletar o diret�rio $diretorio";
			}
		}
		
		return true;
	}
}
?>
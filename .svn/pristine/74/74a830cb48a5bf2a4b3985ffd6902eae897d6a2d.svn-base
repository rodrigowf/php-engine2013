<?php
class AtividadeArquivo{
	public $idArquivo;
	public $idAtividadeVersao;
	public $nome;
	public $tamanho;
	public $nomeUp; //nome físico do arquivo
	
	public $linkDown;
	
	// public static $caminhoPadrao = constant('__CAMINHO_ENVIO__');
	// public static $linkPadrao = constant('__URL_ENVIO__');

		
	public function AtividadeArquivo($idArquivo = NULL, $arrParams = NULL){
		if(is_numeric($idArquivo)){
			$strQuery = "SELECT * FROM atividadeArquivo WHERE idArquivo = $idArquivo";
			if(!$resultTable = BancoDados::query($strQuery)) return false;
			$arrParams = $resultTable[0];
		}
		if(is_array($arrParams)){
			$this->idArquivo		 	= $arrParams["idArquivo"];
			$this->idAtividadeVersao	= $arrParams["idAtividadeVersao"];
			$this->nome	 				= $arrParams["nome"];
			$this->tamanho	 				= $arrParams["tamanho"];
			$this->nomeUp		 		= $arrParams["nomeUp"];
			
			$this->linkDown						= linkDownload('env', $this->nomeUp);
			
			return true;
		} else return false;
	}
	
	public static function getLista($idAtividadeVersao){
		$strQuery = "SELECT * FROM atividadeArquivo WHERE idAtividadeVersao = $idAtividadeVersao";
		$resultMatrix = BancoDados::query($strQuery);
		if(!empty($resultMatrix)){
			foreach($resultMatrix as $i => $conteudo){
				$lista[$i] = new AtividadeArquivo(null, $conteudo);
			}
			return $lista; //retorna lista de instancias de uma atividade
		} 
		else return null;
	}
	
	public static function getByNameBD($nameBD){
		$strQuery = "SELECT * FROM atividadeArquivo WHERE nomeUp = '$nameBD'";
		$resultMatrix = BancoDados::query($strQuery);
		if(!empty($resultMatrix)){
			 return new AtividadeArquivo(null, $resultMatrix[0]);
		}
		else return null;
	}
		
	/**
	 * Insere o arquivo no banco, no disco. obs: não instancia o mesmo.
	 */
	public static function inserir($idAtividadeVersao, $file){
		if (self::valida($file)) {
			$nomeUp =	md5("envio" . $file['name'] . $idAtividadeVersao);
			if (move_uploaded_file($file['tmp_name'], constant('__CAMINHO_ENVIO__') . $nomeUp)) {
				$strQuery = "INSERT INTO atividadeArquivo VALUES(DEFAULT, $idAtividadeVersao,'".$file['name']."', ".$file['size'].", '$nomeUp')";
				
				if (!BancoDados::query($strQuery)) {
					unlink(constant('__CAMINHO_ENVIO__') . $nomeUp);
					
					adicionaMensagem(texto('MENSAGEM_ERRO_UPLOAD_ARQUIVO'), 'erro');
					return false;
				}
			}	else {
				adicionaMensagem(texto('MENSAGEM_ERRO_UPLOAD_ARQUIVO'), 'erro');
				return false;
			}
		} else {
			adicionaMensagem(texto('MENSAGEM_ERRO_UPLOAD_ARQUIVO'), 'erro');
			return false;
		}	
		
		//se retornar false apagar a versao do banco!
		return true;
	}
	
	public static function valida($file){
		return true;
	}
	
	public function getCaminho(){
		return constant('__URL_ENVIO__') . $this->nomeUp;
	}
}
?>
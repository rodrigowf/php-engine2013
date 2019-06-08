<?php

class Files extends Model
{
	public $uploadsFolder = UPLOADS;
	private $lastUploads = null;
	
	private $validation = array();
	
	public function getFromCode($fileCode)
	{
		$data = $this->read('fileCode', $fileCode);
		
		if ( !$data )
		{
			trigger_error('Download Error: Arquivo não encontrado no banco! code= $fileCode', E_USER_WARNING);			
			return false;
		}

		$data = $data['files'];
		$data['path'] = $this->uploadsFolder . $data['upName'];
		
		if ( !file_exists($data['path']) )
		{
			trigger_error('Download Error: Arquivo registrado no banco inexistente! file: $filepath');
			return false;			
		}
		
		if ( filesize($data['path']) != $data['size'] ){
			trigger_error('Download Error: tamanho do arquivo inconsistente com o BD. tam fisico: '.filesize($data['path']).'no bd: '.$data['size']);
			// return false;
		}
		
		return $data;
	}
	
	public function deleteLastUploads()
	{
		foreach ( $this->lastUploads as $filepath ) unlink($filepath);
		//TODO fazer semelhante com as entradas no bd.
	}
	
	public function upload()
	{
		$return = array();
		$this->lastUploads = array();
		$bdInsert = array();
		
		foreach ( $_FILES as $name => $file )
		{
			if ( $file['error'] == 4 ) continue; //se não tiver arquivo sai desse laço do for
			
			else if ( $file['error'] == 1 || $file['error'] == 2 ) {
				trigger_error('Os upload excede o tamanho limite!', E_USER_WARNING);
				return false;
			}
			
			$modelName = null;
			$arrTemp = explode(':', $name);
			if ( count($arrTemp) > 1 )
			{
				$modelName = $arrTemp[0];
			}
			$fieldName = $arrTemp[1];
				
			// antes de inserir cria o fileCode que será um hash de vários dados e será 
			// usado (adaptado) como o nome físico do arquivo, o valor passado na url e o id dele.
			
			$fileCode = uuidGen() . '?' . str_replace('.', '_', $file['name']);
			$upName = hexTo62(sha1($fileCode . uuidGen()));
			
			$fileCompletePath = $this->uploadsFolder . $upName;
			
			$success = move_uploaded_file($file['tmp_name'], $fileCompletePath);
			
			if ( $success ) //se o upload tiver sido completado com sucesso
			{
				//recebe o endereço do ultimo arquivo upado para exclui-lo caso dê algum problema
				$this->lastUploads[] = $fileCompletePath;
				
				//prepara as inserções para a tabela de arquivos (bota na fila)
				$bdInsert[]['files'] = array('fileCode' => $fileCode, 'name' => $file['name'], 'upName' => $upName, 'size' => $file['size'], 'type' => $file['type']);
				
				//joga código do arquivo para o retorno (que será inseridos numa tabela externa)
				if( $modelName !== null )
				{
					$return[$modelName]["file_$fieldName"] = $fileCode;
				}
				else 
				{
					$return["file_$fieldName"] = $fileCode;
				}
			}
			else //se der erro no upload
			{
				//desfaz as alterações feitas até agora.
				foreach($this->lastUploads as $filepath) unlink($filepath);
				
				trigger_error('Upload Error: Falha ao mover arquivo para o servidor!)', E_USER_ERROR);
				return false;
			}
		}

		$_FILES = null;
		
		//inserção
		//aqui que ele insere na tabela de arquivos do banco os arquivos que já estão recém upados!!
		foreach ( $bdInsert as $insertion )
		{
			$success = $this->insert($insertion);
			
			if ( !$success )
			{
				foreach ( $this->lastUploads as $filepath ) unlink($filepath);
				trigger_error('Upload Error: Falha ao fazer a inserção no banco do(s) arquivo(s) upado(s)', E_USER_ERROR);
			}
		}
		
		return $return;
    }
	
}
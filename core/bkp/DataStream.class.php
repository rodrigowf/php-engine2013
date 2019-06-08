<?php
class DataStream 
{

	public $data = NULL;
	
	public function __construct()
	{
		//Trata os dados que vêm do post
		$this->data = isset($_POST['data']) ? $_POST['data'] : null;
	}

	public function array_to_DO($dataArr, &$model)
	{
		foreach ( $dataArr as $index => $value )
		{
		//	$model =
			if ( is_array($value) )
			{
				$this->convertToModel();
			}
		}
	}

	public function DO_to_array()
	{

	}
	
	public function fromControllerToView()
	{
		
	}
	
}

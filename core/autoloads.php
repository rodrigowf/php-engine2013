<?php

	/// Requisicao automatica de classes de sistema
	// function autoload_core_libs($classeName)
	// {
		// $filename	=	$classeName.'.class.php';
		// $file		=	CORE . $filename;
		// 		
		// if ( !file_exists($file) )
		// {
			// echo '<pre>';
			// print_r(debug_backtrace());
			// echo '</pre>';
			// trigger_error("Class $classeName not foun in the engine folder. File: $file inexistent", E_USER_ERROR);
			// return false;
			// 			
		// }
		// require_once $file;
	// }
	// 	
	// spl_autoload_register('autoload_core_libs');

	/// Requisicao automatica de classes que sao usadas no Sistema e não foram explicitamente incluidas
	function autoload_libs($classeName)
	{
		$filename	=	$classeName.'.class.php';
		$file		=	LIB . $filename;
		
		if ( !file_exists($file) )
		{
			trigger_error("Class $classeName not foun in libraries folder. File: $file inexistent", E_USER_NOTICE);
			return false;
		}
		require_once $file;
	}
	
	spl_autoload_register('autoload_libs');
	
	/// Seta pasta lib como fonte para includes e requires
	set_include_path(
		get_include_path() . PS . 
		LIB
	);
<?php
	
if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
if (!defined('PS')) define('PS', PATH_SEPARATOR);


define('URL',			$_SERVER['REQUEST_URI']);


/// MAIN FOLDER PATHS =======================================================

define('APP_ROOT', 		dirname(__FILE__) . DS);
define('APP_DIR', 		basename(dirname(__FILE__)) . DS);


// Url base do sistema. pode ser alterado na mão, eu estou pegando automaticamente
// define('WEB_BASEPATH', str_replace(DS, '/', APP_DIR));
define('WEB_BASEPATH', 	'engineWerneck/');

define('WEB_ROOT', 		'http://' . $_SERVER['SERVER_NAME'] . '/' . WEB_BASEPATH);


/// SYSTEM FILE STRUCTURE (only fisical) ====================================

define('CORE', 			APP_ROOT . 'core/');
define('CONFIG', 		APP_ROOT . 'config/');
define('LIB', 			APP_ROOT . 'lib/');
define('TEMP', 			APP_ROOT . 'tmp/');
define('MODEL', 		APP_ROOT . 'model/');
define('VIEW', 			APP_ROOT . "view/");
define('CONTROLLER', 	APP_ROOT . 'controller/');

//pasta para onde vão os uploads (só tem o caminho físico pois não é permitido o acesso direto!)
define('UPLOADS', 		APP_ROOT . "uploads/");


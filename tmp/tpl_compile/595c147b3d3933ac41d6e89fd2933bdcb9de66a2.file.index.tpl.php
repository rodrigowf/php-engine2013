<?php /* Smarty version Smarty-3.0.8, created on 2013-03-31 04:59:19
         compiled from "C:\xampp\htdocs\engineWerneck\view/web/pages/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186535157a68752fb50-18589332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '595c147b3d3933ac41d6e89fd2933bdcb9de66a2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\engineWerneck\\view/web/pages/index/index.tpl',
      1 => 1364698379,
      2 => 'file',
    ),
    '63ab3946d6e188a6ac718a671c2ed8a2d595c576' => 
    array (
      0 => 'C:\\xampp\\htdocs\\engineWerneck\\view/web/pages/site.tpl',
      1 => 1364698617,
      2 => 'file',
    ),
    'bdaba22e0ac7f0eca408d224a4ec1f2954094162' => 
    array (
      0 => 'C:\\xampp\\htdocs\\engineWerneck\\view/web/pages/html.tpl',
      1 => 1364692170,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186535157a68752fb50-18589332',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_style_autoload')) include 'C:\xampp\htdocs\engineWerneck\core/helpers\function.style_autoload.php';
if (!is_callable('smarty_block_a')) include 'C:\xampp\htdocs\engineWerneck\core/helpers\block.a.php';
if (!is_callable('smarty_function_debugConsole')) include 'C:\xampp\htdocs\engineWerneck\core/helpers\function.debugConsole.php';
if (!is_callable('smarty_function_script_autoload')) include 'C:\xampp\htdocs\engineWerneck\core/helpers\function.script_autoload.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if lt IE 7]> <html xmlns="http://www.w3.org/1999/xhtml" class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html xmlns="http://www.w3.org/1999/xhtml" class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html xmlns="http://www.w3.org/1999/xhtml" class="no-js lt-ie10 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]>    <html xmlns="http://www.w3.org/1999/xhtml" class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html xmlns="http://www.w3.org/1999/xhtml" class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <link href="<?php echo $_smarty_tpl->getVariable('paths')->value['web']['icons'];?>
/favicon.ico" type="image/x-icon" rel="icon">
    <link href="<?php echo $_smarty_tpl->getVariable('paths')->value['web']['icons'];?>
/favicon.ico" type="image/x-icon" rel="shortcut icon">
    
    <link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->getVariable('paths')->value['mobile']['icons'];?>
/apple-touch-icon-precomposed.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $_smarty_tpl->getVariable('paths')->value['mobile']['icons'];?>
/apple-touch-icon-57x57-precomposed.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_smarty_tpl->getVariable('paths')->value['mobile']['icons'];?>
/apple-touch-icon-72x72-precomposed.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_smarty_tpl->getVariable('paths')->value['mobile']['icons'];?>
/apple-touch-icon-114x114-precomposed.png" />
    
    <meta name = "description" content= "<?php echo $_smarty_tpl->getVariable('confs')->value['description'];?>
"/>
    <meta name = "keywords" content= "<?php echo $_smarty_tpl->getVariable('confs')->value['keywords'];?>
"/>
    <meta name="author" content="<?php echo $_smarty_tpl->getVariable('confs')->value['author'];?>
">
    <title><?php echo $_smarty_tpl->getVariable('confs')->value['pageTitle'];?>
</title>

    <meta name="viewport" content="width=device-width">
    
    
    
    
    <?php echo smarty_function_style_autoload(array('default'=>"site"),$_smarty_tpl);?>

    
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('paths')->value['core']['styles'];?>
/debugConsole_resets.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('paths')->value['core']['styles'];?>
/debugConsole_jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('paths')->value['core']['styles'];?>
/debugConsole.css" type="text/css">

    <script type="text/javascript">
        // Loading variables containing the reference paths
         var paths = { modules: {}, web: {} } 

        paths.web.root          = "<?php echo $_smarty_tpl->getVariable('paths')->value['web']['scripts'];?>
/";
        paths.web.images        = "<?php echo $_smarty_tpl->getVariable('paths')->value['web']['images'];?>
/";
        paths.web.styles        = "<?php echo $_smarty_tpl->getVariable('paths')->value['web']['styles'];?>
/";
        paths.modules.root      = "<?php echo $_smarty_tpl->getVariable('paths')->value['modules']['scripts'];?>
/";
        paths.modules.styles    = "<?php echo $_smarty_tpl->getVariable('paths')->value['modules']['styles'];?>
/";
        paths.modules.images    = "<?php echo $_smarty_tpl->getVariable('paths')->value['modules']['images'];?>
/";

    </script>

    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('paths')->value['modules']['scripts'];?>
/paths.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('paths')->value['modules']['scripts'];?>
/libs/less-1.3.0.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('paths')->value['modules']['scripts'];?>
/libs/log.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('paths')->value['modules']['scripts'];?>
/libs/modernizr-2.5.3.custom.68002.min.js"></script>
</head>
<body>
    <!--[if lt IE 7]>
    <p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p>
    <![endif]-->

    

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Project name</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><?php $_smarty_tpl->smarty->_tag_stack[] = array('a', array('a'=>'index','c'=>'index')); $_block_repeat=true; smarty_block_a(array('a'=>'index','c'=>'index'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Home<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_a(array('a'=>'index','c'=>'index'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</li>
                    <li><?php $_smarty_tpl->smarty->_tag_stack[] = array('a', array('a'=>'inserir','c'=>'usuarios')); $_block_repeat=true; smarty_block_a(array('a'=>'inserir','c'=>'usuarios'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Cadastro<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_a(array('a'=>'inserir','c'=>'usuarios'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</li>
                    <li><?php $_smarty_tpl->smarty->_tag_stack[] = array('a', array('a'=>'contato','c'=>'index')); $_block_repeat=true; smarty_block_a(array('a'=>'contato','c'=>'index'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Contato<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_a(array('a'=>'contato','c'=>'index'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">

    
    <!-- Main hero unit for a primary marketing message or call to action -->
    <div class="hero-unit" id="teste1">
      <h1>Site teste Werneck.</h1>
      <p>Esse é o primeiro site que eu construo com a minha engine última versão. <br /> Serve como exmplo e também como teste para que eu melhore ela conforme o desenvolvo.</p>
      <a class="btn primary large">Learn more &raquo;</a>
    </div>
    
    <!-- Example row of columns -->
    <div class="row">
      <div class="span4">
        <h2>Heading</h2>
         <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
      </div>
      <div class="span4">
        <h2>Heading</h2>
         <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
     </div>
      <div class="span4">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
      </div>
    </div>


    <footer>
        <p>&copy; Company 2012</p>
    </footer>

</div> <!-- /container -->



    <?php echo smarty_function_debugConsole(array(),$_smarty_tpl);?>

       
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('paths')->value['modules']['scripts'];?>
/libs/load.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('paths')->value['modules']['scripts'];?>
/loadPolyfills.js"></script>
    <?php echo smarty_function_script_autoload(array('default'=>"site"),$_smarty_tpl);?>


    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('paths')->value['core']['scripts'];?>
/debugConsole.js"></script>
</body>
</html>

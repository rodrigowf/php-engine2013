<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if lt IE 7]> <html xmlns="http://www.w3.org/1999/xhtml" class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html xmlns="http://www.w3.org/1999/xhtml" class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html xmlns="http://www.w3.org/1999/xhtml" class="no-js lt-ie10 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]>    <html xmlns="http://www.w3.org/1999/xhtml" class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html xmlns="http://www.w3.org/1999/xhtml" class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <link href="{$paths.web.icons}/favicon.ico" type="image/x-icon" rel="icon">
    <link href="{$paths.web.icons}/favicon.ico" type="image/x-icon" rel="shortcut icon">
    
    <link rel="apple-touch-icon" href="{$paths.mobile.icons}/apple-touch-icon-precomposed.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="{$paths.mobile.icons}/apple-touch-icon-57x57-precomposed.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="{$paths.mobile.icons}/apple-touch-icon-72x72-precomposed.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="{$paths.mobile.icons}/apple-touch-icon-114x114-precomposed.png" />
    
    <meta name = "description" content= "{block 'description'}{$confs.description}{/block}"/>
    <meta name = "keywords" content= "{block 'keywords'}{$confs.keywords}{/block}"/>
    <meta name="author" content="{block 'author'}{$confs.author}{/block}">
    <title>{block "title"}{$confs.pageTitle}{/block}</title>

    <meta name="viewport" content="width=device-width">
    
    {block "head"}
    {/block}
    
    {block "style"}{style_autoload default="general"}{/block}
    
    <link rel="stylesheet" href="{$paths.core.styles}/debugConsole_resets.css" type="text/css">
    <link rel="stylesheet" href="{$paths.core.styles}/debugConsole_jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="{$paths.core.styles}/debugConsole.css" type="text/css">

    <script type="text/javascript">
        // Loading variables containing the reference paths
        {literal} var paths = { modules: {}, web: {} } {/literal}

        paths.web.root          = "{$paths.web.scripts}/";
        paths.web.images        = "{$paths.web.images}/";
        paths.web.styles        = "{$paths.web.styles}/";
        paths.modules.root      = "{$paths.modules.scripts}/";
        paths.modules.styles    = "{$paths.modules.styles}/";
        paths.modules.images    = "{$paths.modules.images}/";

    </script>

    <script type="text/javascript" src="{$paths.modules.scripts}/paths.js"></script>
    <script type="text/javascript" src="{$paths.modules.scripts}/libs/less-1.3.0.min.js"></script>
    <script type="text/javascript" src="{$paths.modules.scripts}/libs/log.min.js"></script>
    <script type="text/javascript" src="{$paths.modules.scripts}/libs/modernizr-2.5.3.custom.68002.min.js"></script>
</head>
<body>
    <!--[if lt IE 7]>
    <p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p>
    <![endif]-->

    {block "body"}
    {/block}

    {debugConsole}
       
    <script type="text/javascript" src="{$paths.modules.scripts}/libs/load.js"></script>
    <script type="text/javascript" src="{$paths.modules.scripts}/loadPolyfills.js"></script>
    {block "script"}{script_autoload default="general"}{/block}

    <script type="text/javascript" src="{$paths.core.scripts}/debugConsole.js"></script>
</body>
</html>

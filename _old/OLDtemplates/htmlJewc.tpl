<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<meta name = "description" content= "{block 'description'}{$_description}{/block}"/>
		<meta name = "keywords" content= "{block 'keywords'}{$_keywords}{/block}"/>
		
		<link href="{$_styles}/images/favicon.ico" type="image/x-icon" rel="icon">
		<link href="{$_styles}/images/favicon.ico" type="image/x-icon" rel="shortcut icon">

		<script type='text/javascript'>
			less = {}; less.env = 'development';

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-29009692-1']);
            _gaq.push(['_trackPageview']);

            (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
		</script>
		
		<link rel="stylesheet" type="text/css" href="{$_styles}/reset.css?version=1" />
		<link rel="stylesheet" type="text/css" href="{$_styles}/print.css?version=1" media="print" />
		<!--[if lt IE 8]>
		  <link rel="stylesheet" href="{$_styles}/ie.css" type="text/css?version=1" media="screen, projection" />
		<![endif]-->
		
        <link rel="stylesheet" href="{$_styles}/engine/debugConsole.less?version=1" type="text/less">

        <script type="text/javascript" src="{$_scripts}/libs/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="{$_scripts}/libs/jquery-ui-1.8.17.custom.min.js"></script>
		<script type="text/javascript" src="{$_scripts}/engine/functions.js?version=1"></script>

		<script type="text/javascript" src="{$_scripts}/geral.js?version=1"></script>
		<script type="text/javascript" src="{$_scripts}/engine/debugConsole.js?version=1"></script>

		{block "css"}{css_autoload}{/block}
		{block "js"}{js_autoload}{/block}
		
		{block "head"}
		{/block}
		
        <script src="{$_scripts}/libs/svgweb/svg.js" data-path="{$_scripts}/libs/svgweb/"></script>
		<script type="text/javascript" src="{$_scripts}/libs/less-1.2.1.min.js?version=1"></script>
		
		<title>{block "title"}JEWC 2012{$_pageTitle}{/block}</title>
		
	</head>
	<body>
	    <div class="svgBackground">
	       {svg file="background.svg" class="svgBackground" width='100%' height='100%' }
	    </div>
	    
		<div class="container">
			{block "body"}
			{/block}
		</div>
		
		{debugConsole}
	</body>
</html>
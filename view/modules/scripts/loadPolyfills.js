/** Funções para testar qual a versão do navegador se for IE */
function getIEVersion(){var a=-1;if(navigator.appName=="Microsoft Internet Explorer"){var b=navigator.userAgent;var c=new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");if(c.exec(b)!=null)a=parseFloat(RegExp.$1)}return a}
function testIEVersion(a){return a==getIEVersion()}

Modernizr.load (
[
	{
		test: Modernizr.mq('only all and (min-width: 0px) and (max-width: 400px)'),
		nope: paths.modules.polyfills+'respond.min.js'
	},
	{
		test: testIEVersion(8) || testIEVersion(7),
		yep: paths.modules.polyfills+'IE9.js'
	},
	{
		//TODO colocar um polyfill e setar esse teste como true.
		load: paths.modules.libs+'testTransitionSuport.js'
	}
])

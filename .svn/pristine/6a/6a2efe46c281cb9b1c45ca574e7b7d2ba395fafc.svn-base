/* ===================================================
 * load funtions.
 * http://www
 * ===================================================
 * Author Rodrigo Werneck.
 *
 * Functions made to call scripts in lazy load.
 * ========================================================== */


var scriptsDefaultFormat    = '.js';
var stylesDefaultFormat     = '.css';
var modulesRootFolder       = paths.modules.root;
var stylesRootFolder        = paths.modules.styles;
var webScriptsRootFolder    = paths.web.root;

/**
 *  para testar caso o cara passe besteira como primeiro parametro para o load! 
 */
function is_array_of_strings(input){
	if ( typeof(input) == 'object' && input instanceof Array ) {
		for ( val in input ) if ( typeof(val) != 'string' ) return false;
		return true;
	}
	else return false;
}

//TODO testar tratamento de erros!
//TODO criar tratamento de erro para usuários: classe semelhante ao debugger, com func trigger_error, que printa alert para o usuário.
//testar limite de tempo da requisição do load() e chamar o 'trigger error' caso seja insucesso

/**
 * Só para carregamento de scripts que estão no mesmo escopo (web ou mobile)
 *
 * @param input - Pode ser string com o nome dos scripts sem ".js" e com o caminho a partir da pasta "modules"
 */
function require(input, callback)
{
    var load = null;

    if ( typeof(input) == 'object' && (input instanceof Array) )
    {
        var load = Array();

        for ( var i in input )
        {
            load.push(webScriptsRootFolder+input[i]+scriptsDefaultFormat);
        }
    }
    else
    {
        load = webScriptsRootFolder+input+scriptsDefaultFormat;
    }

    Modernizr.load({
        load: load,
        complete: callback
    });
};

/**
 * Só para carregamento de scripts
 *
 * @param input - Pode ser string com o nome dos scripts sem ".js" e com o caminho a partir da pasta "modules"
 */
function include(input)
{
    var load = null;

    if ( typeof(input) == 'object' && (input instanceof Array) )
    {
        var load = Array();

        for ( var i in input )
        {
            load.push(modulesRootFolder+input[i]+scriptsDefaultFormat);
        }
    }
    else
    {
        load = modulesRootFolder+input+scriptsDefaultFormat;
    }

    Modernizr.load(load);
};

/**
 * Para desenvolvimento modular: Só shama o callback qdo os scripts do parâmetro 'input' forem carregados.
 *
 * @param input - Pode ser string com o nome dos scripts sem ".js" e com o caminho a partir da pasta "modules"
 * @param callback
 */
function module(input, callback)
{
    var load = null;

    if ( typeof(input) == 'object' && (input instanceof Array) )
    {
        var load = Array();

        for ( var i in input )
        {
            load.push(modulesRootFolder+input[i]+scriptsDefaultFormat);
        }
    }
    else
    {
        load = modulesRootFolder+input+scriptsDefaultFormat;
    }

    Modernizr.load({
        load: load,
        complete: callback
    });
};

/**
 * Só para carregamento de estilos
 *
 * @param input - Pode ser string com o nome dos scripts sem ".js" e com o caminho a partir da pasta "modules"
 */
function loadStyle(input)
{
    var load = null;

    if ( typeof(input) == 'object' && (input instanceof Array) )
    {
        var load = Array();

        for ( i in input )
        {
            load.push(stylesRootFolder+input[i]+stylesDefaultFormat);
        }
    }
    else
    {
        load = stylesRootFolder+input+stylesDefaultFormat;
    }

    Modernizr.load(load);
};

//TODO colocar carregamento da lib pelo google primeiro e depois a tentativa pelo local - para isso fazer locks

/*
 * Função que carrega a biblioteca jquery para que ela só seja chamada quando necessário.
 *
function jquery(callback)
{
    if (!this.loaded) //testa se alguma vez já foi carregada a biblioteca
    {
        load(
        {
            load:'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js',
            complete:function () {
                if (!window.jQuery) {
                    load(
                        {
                            load:'libs/jquery.js',
                            complete:function () {
                                this.loaded = true;
                                callback();
                            }
                        });
                }
                else {
                    this.loaded = true;
                    callback();
                }
            }
        });
    }
    else {
        callback();
    }
}
*/
function is_array(input){
	return typeof(input) == 'object' && (input instanceof Array);
}
function is_string(input){
	return typeof(input) == 'string';
}
function is_numeric(input){
	return typeof(input) == 'number' || (typeof(input) === 'string' && !isNaN(input));
}
function is_object(input){
	return typeof(input) == 'object' && !(input instanceof Array);
}

/**
 * Recebe um nome de controller e um nome puro de input e monta o name que ele deve ter no padrão do sistema
 */
function mountInputName(name, controller)
{
	if( is_object(name) && name.hasOwnProperty('name') )
	{
		if ( name.hasOwnProperty('controller') ) controller = name['controller'];
		name = name['name'];
	}
	
	return controller ? 'data['+controller+']['+name+']' : 'data['+name+']';
}

/**
 * Divide um input name em 'name' e 'controller' conforme o padrão do framework (e do cake).
 */
function splitInputName(nameArr)
{
	var arr = nameArr.split('[');
	
	$.each(arr, function(i, v){
		arr[i] = v.replace(']', '');
	});
	if 		( arr.length == 3 ) return { name: arr[2], controller: arr[1] };	
	else if	( arr.length == 2 ) return { name: arr[1] };
	else						return false;
}

var errorMessages = 
{
	required:	"This field is required!",
	matches:	"The fields doesn't match!",
	numeric:	"Only numbers!",
	minlen:		"Minimun size of %s characters!",
	email:		"Incorrect mail adress!",	
}

/**
 * Se estiver com o name no formato do sistema (data[usuarios][email]) encapsular em um objeto 'usuarios'.
 */
var validationRules =
{
	inputtext: 		'required|email',
	password: 		'required|minlen=3',
	chk_password:	'required|matches=password',
	chbox:			'required',
	question:		'required',
	mytext:			'required',
	select2:		'required',
	arquivao:		'required',
}

var valErrors = new Array();

/**
 * Valida todos os elementos que estão no array de validação 'validationRules'
 */
function autoValidatePerRules() //TODO testar isso!!
{
	valErrors = new Array();
	var ret = true;
	
	$.each(validationRules, function(fieldName, strRule)
	{
		function validateEach(index, rule)
		{
			var pos = rule.indexOf('=');

			if ( pos != -1 )
			{
				var spec = rule.slice(pos+1);
				var rule = rule.slice(0, pos);
			}
			
			//TODO se o name for no formato do sistema (estiver encapsulado no array) montá-lo com mountInputName()
			element = $('*[name='+fieldName+']');
			ret = validate(element, rule, spec) && ret;
		}
		
		if ( strRule.search('|') != -1 ) 
		{
			var rules = strRule.split('|');
			$.each(rules, validateEach);
		}
		else 
		{
			validateEach(0, strRule);
		}
	});
	
//	if ( !ret ) alert('erro de validacao!!!');
//	else		alert('a validacao foi um sucesso!!');
	
	return ret;
}

/**
 * Busca todos os elementos do form checa qual a validação para ele e o valida.
 */
function autoValidatePerClass() 
{
	new Array();
	var ret = true;
	
	//testa para todos os elementos de formulário
	$('input, select, textarea').each(function()
	{
		var element 	= $(this);
		var strClass 	= element.attr('class');

		if ( is_string(strClass) && strClass.search('validate_') != -1 ) 
		{	
			function validateEach(index, classe)
			{
				var arr = classe.split('_');
				
				if( arr[0] == 'validate' ) {
					ret = validate(element, arr[1], arr[2]) && ret;
				}
			}
			
			if ( strClass.search(' ') != -1 ) 
			{
				var classes = element.attr('class').split(' ');
				$.each(classes, validateEach);
			}
			else 
			{
				validateEach(0, strClass);
			}
		}
	});
	
	if ( !ret ) alert('erro de validacao!!!');
	else		alert('a validacao foi um sucesso!!');
	
	return ret;
}

/**
 * Chama a validação para o elemento passado e exibe a mensagem de erro caso não valide
 */
function validate(element, rule, spec)
{
	//TODO mudar isso para ficar compatível com o sistema (a busca do id da mensagem de erro)
	if( element.attr('type') == 'radio' ) 
	{
		var errorId = '';
		$('input[name='+element.attr('name')+']').each(function()
		{
			errorId = errorId != '' ? errorId+'-'+$(this).attr('id') : $(this).attr('id');
		});		
		var errorId = errorId+'_error';
	} 
	else 
	{
		var errorId = element.attr('id')+'_error';
	}

	var errorElem 	= $('#'+errorId);
	
	if ( !checkField(element, rule, spec) )
	{
		var msg 						= errorMessages[rule];
		if ( msg.indexOf('%s') != -1 ) 	msg = msg.replace(/\%s/, spec);
		if ( errorElem.html() == '' ) 	errorElem.html(msg); //a ordem de prioridade é por quem vem primeiro na lista de classes
		valErrors[element.attr('name')] = rule;
		return false;
	}
	else
	{
		//só limpa a mensagem de erro se não tiver nenhum erro no array dessa verificação
		if ( !valErrors.hasOwnProperty(element.attr('name')) ) 
		{
			errorElem.html('');
		}
		return true;
	}
}

/**
 * Aqui faz de fato a validação de cada campo individualmente
 */
function checkField(element, rule, spec)
{
	switch(rule)
	{
		case 'required': 	return validateRequired(element);
		case 'matches':		return seeIfMatches(element, spec);
		case 'numeric':		return is_numeric(element.val());
		case 'alphabetic':	return element.val().match(/^[a-zA-Z]*$/);
		case 'alphanum':	return element.val().match(/^[0-9a-zA-Z]*$/);
		case 'maxlen':		return ( element.val().length <= spec );
		case 'minlen':		return ( element.val().length >= spec );
		case 'length':		return ( element.val().length == spec );
		case 'email':		return validateEmail(element.val());
		case 'regexp':		return element.val().match(new RegExp(spec));
	}
}

function validateRequired(element)
{
	var tagName = element.prop('tagName').toLowerCase();
	
	if( tagName == 'input' )
	{
		switch(element.attr('type'))
		{
			case 'file':
			case 'text':
			case 'password':
				return element.val().length != 0;
				
			case 'checkbox':
				return element.is(':checked');

			case 'radio':
				var ret = false;
				$('input[name='+element.attr('name')+']').each(function(){
					if ( $(this).is(':checked') ) ret = true;
				});
				return ret;
		}
	}
	else if ( tagName ==  'select') 
	{
		return element.children(':selected').val().length != 0;
	}
	else if ( tagName ==  'textarea')
	{
		return element.val().length != 0;
	}
}

function seeIfMatches(element, matchName)
{
	//Ajeita o name que será comparado com o desse elemento de acordo com o padrão do sistema.
	inputNames = splitInputName(element.attr('name'))
	if( inputNames !== false )
	{
		if ( is_string(inputNames['controller']) ) matchName = 'data['+inputNames['controller']+']['+matchName+']';
		else matchName = 'data['+matchName+']';
	}
	
	return element.val() == $('*[name='+matchName+']').val();
}

function validateEmail(email)
{
    var splitted = email.match("^(.+)@(.+)$");
    if(splitted == null) return false;
    if(splitted[1] != null )
    {
      var regexp_user=/^\"?[\w-_\.]*\"?$/;
      if(splitted[1].match(regexp_user) == null) return false;
    }
    if(splitted[2] != null)
    {
      var regexp_domain=/^[\w-\.]*\.[A-Za-z]{2,4}$/;
      if(splitted[2].match(regexp_domain) == null) 
      {
       var regexp_ip =/^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
       if(splitted[2].match(regexp_ip) == null) return false;
      }// if
      return true;
    }
	return false;
}


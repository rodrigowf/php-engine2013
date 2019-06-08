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
function is_array_of_objects(input){
	if ( input instanceof Array ) {
		for ( val in input ) if ( typeof(val) != 'object' || (val instanceof Array) ) return false;
		return true;
	}
	else return false;
}
function is_array_of_strings(input){
	if ( typeof(input) == 'object' && input instanceof Array ) {
		for ( val in input ) if ( typeof(val) != 'string' ) return false;
		return true;
	}
	else return false;
}
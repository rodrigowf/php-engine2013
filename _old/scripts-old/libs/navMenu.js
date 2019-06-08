/**
 * Classe que controla o menu (ou possivelamente qualquer coisa popup).
 */
function NavMenu(trigger, timeout, duration, easing) 
{
	this.trigger = trigger;
	
	this.closetimer = 0;
	this.ddmenuitem = 0;
	
	this.duration	= duration;
	this.easing		= easing;
	
	if ( timeout == null ) 	this.timeout = 250;
	else 					this.timeout = timeout;

	document.onclick = this.close;
	
	trigger.on('mouseover', { me: this }, this.open);
	trigger.on('mouseout',  { me: this }, this.timer);
}
NavMenu.prototype.Bind = function( fnMethod ){
	var objSelf = this;
 
	// Return a method that will call the given method
	// in the context of THIS object.
	return(
		function(){
			return( fnMethod.apply( objSelf, arguments ) );
		}
	);
}
NavMenu.prototype.open = function(event)
{
	var me = event.data.me;
	
	me.canceltimer(me);
	me.close();
	me.ddmenuitem = $(this).find('ul').show(me.duration, me.easing);
	$(this).addClass('hover');
}

NavMenu.prototype.timer = function(event)
{
	var me = event.data.me;

	me.closetimer = setTimeout(
		me.Bind( me.close ),
		me.timeout
	);
}
NavMenu.prototype.canceltimer = function() 
{
	if(this.closetimer){
		window.clearTimeout(this.closetimer);
		this.closetimer = null;
	}
}
NavMenu.prototype.close = function()
{
	if(this.ddmenuitem) {
		this.ddmenuitem.hide(this.duration, this.easing);
	}
	this.trigger.removeClass('hover');
}

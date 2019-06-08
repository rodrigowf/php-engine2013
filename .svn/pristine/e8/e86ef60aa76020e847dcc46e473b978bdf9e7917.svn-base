var timeout    = 50;
var closetimer = 0;
var ddmenuitem = 0;

function navMenu_open(){
	navMenu_canceltimer();
	navMenu_close();
	ddmenuitem = $(this).find('ul').show();
	$(this).children('a.eneabled').css('background', 'url(css/images/menu-hover.gif) no-repeat');
	$(this).children('a.eneabled').css('color', '#a7c4ee');
}

function navMenu_close(){  
	if(ddmenuitem) {
		ddmenuitem.hide();
		$('#navMenu > li > a.eneabled').css('background', 'none');
		$('#navMenu > li > a.eneabled').css('color', '#6196e3');
	}
}

function navMenu_timer(){
	closetimer = window.setTimeout(navMenu_close, timeout);
}

function navMenu_canceltimer(){
	if(closetimer){
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

$(document).ready(function(){  
	
	$('#navMenu > li').bind('mouseover', navMenu_open);
	$('#navMenu > li').bind('mouseout',  navMenu_timer);
	
	$('#navMenu li ul').corner("15px bottom");
	$('#navMenu li ul li a').corner("9px");
});

document.onclick = navMenu_close;
$().ready(function(){
	var debugConsole_height = $("#engine-debugConsole").css('height');
	//$('#engineConsole-body').hide();
	
	hideConsole();
	
	function hideConsole(){
		if($("#engine-debugConsole").css('height') != '40px')
		{
			debugConsole_height = $("#engine-debugConsole").css('height');			
		}
		$("#engine-debugConsole").resizable( "option", "disabled", true );
		$('#engineConsole-body').hide();
		$("#engine-debugConsole").css('height', '40px');
		$("#engine-debugConsole").css('top', 'auto');
		$("#engine-debugConsole").css('bottom', '0px');
	}
	
	function showConsole(){
		$("#engine-debugConsole").resizable( "option", "disabled", false );
		$('#engineConsole-body').show();
		$("#engine-debugConsole").css('height', 'auto');
	}
	
	/*
	$("#engine-debugConsole").resizable({ 
		handles: 'n',
		minHeight: 40,
		maxHeight: 300,
		start: function(event, ui) {
			debugConsole_height = $(this).css('height');
		},
		stop: function() {
			if($(this).css('height') == '40px'){
				hideConsole();
			}
		}
	});
	*/
	
	$('div#engine-debugConsole div span#title').click(function(){
		if($('#engineConsole-body').css('display') == "none"){
			showConsole();
		} else {
			hideConsole();
		}
	})

	$("#engine-debugConsole-container").tabs({
		//collapsible: true
	});	
	
	$('.engineDump-expand').click(function(){
		$(this).parent().children('.engineDump-nest').toggle('fast');
	})
});
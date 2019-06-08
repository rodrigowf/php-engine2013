$(document).ready(function() {


    $("#federacao_ej").hide();
    $("#federacao_ej label").hide();
    $('select[data-tipo="1"]').hide();
    $('label[data-tipo="1"]').hide();
    $('select[data-tipo="0"]').hide();
    $('label[data-tipo="0"]').hide();


    jQuery(function($){

            $("#niver_mes").mask("99");

            $("#niver_dia").mask("99");

            $("#niver_ano").mask("9999");

    });


    $("#confederacao").change(function(){
       if($("#confederacao").val() == 'Brasil Junior'){
           if($('select[data-tipo="1"]').is(":visible")){
               $("#federacao_ej").hide();
               $('select[data-tipo="1"]').hide();
               $('label[data-tipo="1"]').hide();
               $('select[data-tipo="0"]').hide();
               $('label[data-tipo="0"]').hide();
           }
		
			   $('select[data-tipo="1"]').attr('name','');		
			
		   $('select[data-tipo="0"]').attr('name',"data[usuarios][federacao_ej]");	
           $("#federacao_ej").show('fast');
           $('label[data-tipo="0"]').show('slow');
           $('select[data-tipo="0"]').show('slow');

       }
        if($("#confederacao").val() == 'JADE'){
           if($('select[data-tipo="0"]').is(":visible")){
               $("#federacao_ej").hide();
               $('select[data-tipo="1"]').hide();
               $('label[data-tipo="1"]').hide();
               $('select[data-tipo="0"]').hide();
               $('label[data-tipo="0"]').hide();
           }
		   
		   $('select[data-tipo="0"]').attr('name','');
			
		   $('select[data-tipo="1"]').attr('name',"data[usuarios][federacao_ej]");
           $("#federacao_ej").show('fast');
           $('label[data-tipo="1"]').show('slow');
           $('select[data-tipo="1"]').show('slow');
       }
        if($("#confederacao").val() != 'JADE' && $("#confederacao").val() != 'Brasil Junior'){
            if($('select[data-tipo="0"]').is(":visible")){
                $("#federacao_ej").hide();
                $('select[data-tipo="1"]').hide();
                $('label[data-tipo="1"]').hide();
                $('select[data-tipo="0"]').hide();
                $('label[data-tipo="0"]').hide();
                $('select[data-tipo="0"]').attr('name','');
                $('select[data-tipo="1"]').attr('name','');
            }

            if($('select[data-tipo="1"]').is(":visible")){
                $("#federacao_ej").hide();
                $('select[data-tipo="1"]').hide();
                $('label[data-tipo="1"]').hide();
                $('select[data-tipo="0"]').hide();
                $('label[data-tipo="0"]').hide();
                $('select[data-tipo="0"]').attr('name','');
                $('select[data-tipo="1"]').attr('name','');
            }

        }

    });


});
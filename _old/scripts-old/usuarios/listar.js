$(document).ready(function() {
    $("#searchresultdata").hide();
    var search_timeout = undefined;
	$('.loading_valor').hide();

    $('.delete').click(function() {
        var parent = $(this).closest('tr');
        $.ajax({
            type: 'get',
            url: 'usuarios/../../excluir/',
            data: $(this).attr('id'),
            beforeSend: function() {
                parent.animate({'backgroundColor':'#fb6c6c'},300);
            },
            success: function() {
                parent.fadeOut(300,function() {
                    parent.remove();
                });
            }
        });

    });

    $('.delete').confirm({
        msg:'Tem certeza?',
        timeout:3000
    });

    $(".pagamento").click(function(){
        var x = $(this);
        $.ajax({
            async: false,
            type: 'get',
            url: 'usuarios/../../setPayment/',
            data: "id=" + $(this).attr('id') + "&status=" + $(this).attr('data-intPagou'),
            beforeSend: function(){ 
							x.hide();
							$(".loading_valor", x.parent()).show(); 
							//alert);
			},
			success: function(){
                if( $(x).attr('data-intPagou') == 0) {
                              $(x).attr('src',"../../images/pagamento/0.5.png");
                              $('.loading_valor').hide(); 
							  $(x).show();
							  return $(x).attr('data-intPagou','0.5');
                }
                if( $(x).attr('data-intPagou') == 0.5) {
                        $(x).attr('src',"../../images/pagamento/1.png");
                    	$('.loading_valor').hide();
						$(x).show(); 
					return $(x).attr('data-intPagou','1');
                }
                if( $(x).attr('data-intPagou') == 1) {
                    $(x).attr('src',"../../images/pagamento/0.png");
					$('.loading_valor').hide();
					$(x).show(); 
                    return $(x).attr('data-intPagou','0');
                }
            }
        });
    });


});
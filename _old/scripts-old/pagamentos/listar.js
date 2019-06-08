$(document).ready(function() {
    $("#searchresultdata").hide();
    var search_timeout = undefined;
    $('.loading_valor').hide();


    $(".pagamento").click(function(){
        var x = $(this);
        $.ajax({
            async: false,
            type: 'get',
            url: 'pagamentos/../../setPayment/',
            data: "nossoNumero=" + $(this).attr('id') + "&status=" + $(this).attr('data-pago'),
            beforeSend: function(){
                x.hide();
                $(".loading_valor", x.parent()).show();
                //alert);
            },
            success: function(){
                if( $(x).attr('data-pago') == 0) {
                    $(x).attr('src',"../../images/pagamento/1.png");
                    $('.loading_valor').hide();
                    $(x).show();
                    return $(x).attr('data-pago','1');
                }
                if( $(x).attr('data-pago') == 1) {
                    $(x).attr('src',"../../images/pagamento/0.png");
                    $('.loading_valor').hide();
                    $(x).show();
                    return $(x).attr('data-pago','0');
                }
            }
        });
    });

    $('.pagamento').confirm({
        msg:'Tem certeza?',
        timeout:3000
    });


});
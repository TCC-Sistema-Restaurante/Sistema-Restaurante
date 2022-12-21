function buscar(texto) {
    $.ajax({
        url: 'pedidos.php',
        type: "post",
        data: {
            texto: texto
        },

        success: function (data1) {
            // console.log(status)
            $('#container').html(data1)
        }

    });

};

$(document).ready(function () {
    buscar();

    $('#buscar').keyup(function () {
        var texto = $(this).val();
        if (texto != '') {
            buscar(texto);
        }
        else {
            buscar();
        }
    });
    $('#filtro').on('change', function(){
        var value = $(this).val();
        // alert(value);
        $.ajax({
            url:"pedidos.php",
            type:"post",
            data:'request=' + value,
            beforeSend:function(){
                $(".container").html("<span>Carregando...</span>");

            },
            success: function(data){
                $(".container").html(data);

            }
        })
    })
    $('#datefilter').on('change', function(){
        var value = $(this).val();
        alert(value);
        $.ajax({
            url:"pedidos.php",
            type:"post",
            data:'request_date=' + value,
            beforeSend:function(){
                $(".container").html("<span>Carregando...</span>");

            },
            success: function(data){
                $(".container").html(data);

            }
        })
    })
});
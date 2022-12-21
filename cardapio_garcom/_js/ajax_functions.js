function buscar(texto) {
    $.ajax({
        url: 'buscar.php',
        type: "post",
        data: {
            texto: texto
        },

        success: function (data) {
            // console.log(status)
            $('#container').html(data)
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
});
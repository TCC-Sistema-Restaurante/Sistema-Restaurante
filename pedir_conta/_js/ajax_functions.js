function mostrarConta() {
    var url = window.location.href;
    var dados_url = url.split("?");
    var id_mesa = dados_url[1];
    var soma = dados_url[2];

    $.ajax({
        url: 'mostrar_conta.php',
        type: "post",
        data: {
            id_mesa: id_mesa,
            soma: soma
        },
        success: function (data) {
            // console.log(status)
            $('.pedir-conta').html(data)
        }

    });
};

$(document).ready(function () {
    mostrarConta();
});

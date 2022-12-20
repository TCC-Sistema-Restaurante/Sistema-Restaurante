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



$("#btn-pagar-conta").click(function (e) {
    e.preventDefault();

    var IDs_pedidos = $('#idsPedidos').val();
    IDs_pedidos = IDs_pedidos.slice(0, IDs_pedidos.length - 1);

    $.ajax({
        url: 'pagar_conta.php',
        type: "post",
        data: {
            IDs_pedidos: IDs_pedidos,
        }

    }).done(function (resultado) {
        if (resultado == "salvo!") {
            swal
                .fire({
                    icon: "success",
                    text: "Pagamento registrado",
                    type: "success",
                })
                .then((okay) => {
                    if (okay) {
                        document.location.reload(true);
                    }
                });
        } else {
            swal
                .fire({
                    icon: "error",
                    text: "Ops! Houve um erro.",
                    type: "success",
                })
                .then((okay) => {
                    if (okay) {
                        document.location.reload(true);
                    }
                });
        }
    });

});
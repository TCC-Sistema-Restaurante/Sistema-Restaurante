// Mostrar mesas
function mostrarMesas() {
    $.ajax({
        url: 'mostrar_mesas.php',
        type: "GET",
        success: function (data) {
            // console.log(status)
            $('.accordion').html(data)
        }

    });

};

mostrarMesas();

$(document).ready(function () {
    mostrarMesas();
});

// enviar_conta
$("h1").click(function (e) {
    var id_mesa = $("#numero-da-mesa").text().replace("Mesa ", "");

    console.log(id_mesa);
    $.ajax({
        type: "POST",
        url: "enviar_conta.php",
        data: { id_mesa: id_mesa },
        dataType: "json",
    });
});
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

$(document).ready(function () {
    mostrarMesas();
});

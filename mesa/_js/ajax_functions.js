// BUSCAR
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



// DELETAR USUÁRIO
const modal_delet = document.getElementById("modalDeletar");

modal_delet.addEventListener("show.bs.modal", (event) => {
    const button = event.relatedTarget;
    const id_item = button.getAttribute("data-bs-whateverNumeroDelet");
    const inputNumero = $("#inputNumeroEdit");

    inputNumero.val(id_item);
});

$("#deletar-item").click(function (e) {
    var numero_delet = $("#inputNumeroEdit").val();

    $.ajax({
        type: "POST",
        url: "deletar.php",
        data: { numero_delet: numero_delet },
        dataType: "json",
    });

    setTimeout(() => {
        buscar();
    }, 200);

    $("#delet-btn-close").click();
});



//EDITAR USUÁRIO
const modal = document.getElementById("modalEditar");
modal.addEventListener("show.bs.modal", (event) => {
    const button = event.relatedTarget;

    const dados_numero = button.getAttribute("data-bs-whateverNumero");
    const dados_situacao = button.getAttribute("data-bs-whateverSituacao");
    const dados_disponibilidade = button.getAttribute("data-bs-whateverDisponibilidade");
    const dados_cadeiras = button.getAttribute("data-bs-whateverCadeiras");
    


    const input_numero = modal.querySelector("#inputNumero");
    const input_situacao = modal.querySelector("#inputSituacao");
    const input_disponibilidade = modal.querySelector("#inputDisponibilidade");
    const input_cadeiras = modal.querySelector("#inputCadeiras");
    


    input_numero.value = dados_numero;
    input_situacao.value = dados_situacao;
    input_disponibilidade.value = dados_disponibilidade;
    input_cadeiras.value = dados_cadeiras;
    

});

$("#form-editar").on("submit", function (e) {
    e.preventDefault();

    var numero_editar = $("#inputNumero").val();
    var situacao_editar = $("#inputSituacao").val();
    var disponibilidade_editar = $("#inputDisponibilidade").val();
    var cadeiras_editar = $("#inputCadeiras").val();
   

    var form_data = new FormData();
    form_data.append("numero_editar", numero_editar);
    form_data.append("situacao_editar", situacao_editar);
    form_data.append("disponibilidade_editar", disponibilidade_editar);
    form_data.append("cadeiras_editar", cadeiras_editar);



    $.ajax({
        url: "editar.php",
        method: "POST",
        dataType: "json",
        processData: false,
        contentType: false,
        data: form_data,

    }).done(function (resultado) {
        if (resultado == "salvo!") {
            swal
                .fire({
                    icon: "success",
                    text: "Editado com sucesso!",
                    type: "success",
                })
                .then((okay) => {
                    if (okay) {
                        $("#edit-btn-close").click();
                        buscar();
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
                        $("#edit-btn-close").click();
                        buscar();
                    }
                });
        }
        buscar();
    });
});



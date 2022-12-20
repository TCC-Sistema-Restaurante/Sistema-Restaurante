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

$("#cadastrarForm").on("submit", function (e) {
    e.preventDefault();
    var numero = $("#numero").val();
    var cadeiras = $("#cadeiras").val();
    var situacaoSelect = document.getElementById("situacaoSelect");
    var situacaoValue = situacaoSelect.options[situacaoSelect.selectedIndex].value;
    var disponibilidadeSelect = document.getElementById("disponibilidadeSelect");
    var disponibilidadeValue = disponibilidadeSelect.options[disponibilidadeSelect.selectedIndex].value;

    var form_data = new FormData();
    form_data.append("numero", numero);
    form_data.append("cadeiras", cadeiras);
    form_data.append("disponibilidade", disponibilidadeValue);
    form_data.append("situacao", situacaoValue);

    $.ajax({
        url: "cadastrar.php",
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
                    text: "Cadastrado com sucesso!",
                    type: "success",
                })
                .then((okay) => {
                    if (okay) {
                        $("#cadBtnClose").click();
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
                        $("#cadBtnClose").click();
                        buscar();
                    }
                });
        }
    });
    
});




// DELETAR MESA
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



//EDITAR MESA
const modal = document.getElementById("modalEditar");
modal.addEventListener("show.bs.modal", (event) => {
    const button = event.relatedTarget;

    const dados_id = button.getAttribute("data-bs-whateverId");
    const dados_numero = button.getAttribute("data-bs-whateverNumero");
    const dados_situacao = button.getAttribute("data-bs-whateverSituacao");
    const dados_disponibilidade = button.getAttribute("data-bs-whateverDisponibilidade");
    const dados_cadeiras = button.getAttribute("data-bs-whateverCadeiras");
    
    const input_numero = modal.querySelector("#inputNumero");
    const input_id = modal.querySelector("#inputId");
    const input_cadeiras = modal.querySelector("#inputCadeiras");
    input_id.value = dados_id;
    input_numero.value = dados_numero;

    input_cadeiras.value = dados_cadeiras;
    

});



$("#form-editar").on("submit", function (e) {
    e.preventDefault();

    var id_editar = $("#inputId").val();
    var numero_editar = $("#inputNumero").val();
    var cadeiras_editar = $("#inputCadeiras").val();
    var situacaoSelect = modal.querySelector("#situacaoSelect");
    var situacaoValue = situacaoSelect.options[situacaoSelect.selectedIndex].value;
    var disponibilidadeSelect = modal.querySelector("#disponibilidadeSelect");
    var disponibilidadeValue = disponibilidadeSelect.options[disponibilidadeSelect.selectedIndex].value;


    var form_data = new FormData();
    form_data.append("id_editar", id_editar);
    form_data.append("numero_editar", numero_editar);
    form_data.append("situacao_editar", situacaoValue);
    form_data.append("disponibilidade_editar", disponibilidadeValue);
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



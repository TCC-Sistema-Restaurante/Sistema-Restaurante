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
    const id_item = button.getAttribute("data-bs-whateverIdDelet");
    const inputId = $("#inputIdEdit");

    inputId.val(id_item);
});

$("#deletar-item").click(function (e) {
    var id_delet = $("#inputIdEdit").val();

    $.ajax({
        type: "POST",
        url: "deletar.php",
        data: { id_delet: id_delet },
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

    const dados_id = button.getAttribute("data-bs-whateverId");
    const dados_nome = button.getAttribute("data-bs-whateverNome");
    const dados_usuario = button.getAttribute("data-bs-whateverUsuario");
    const dados_senha = button.getAttribute("data-bs-whateverSenha");
    const dados_cpf = button.getAttribute("data-bs-whateverCpf");
    const dados_funcao = button.getAttribute("data-bs-whateverFuncao");


    const input_id = modal.querySelector("#inputId");
    const input_nome = modal.querySelector("#inputNome");
    const input_usuario = modal.querySelector("#inputUsuario");
    const input_senha = modal.querySelector("#inputSenha");
    const input_cpf = modal.querySelector("#inputCpf");
    const input_funcao = modal.querySelector("#inputFuncao");


    input_id.value = dados_id;
    input_nome.value = dados_nome;
    input_usuario.value = dados_usuario;
    input_senha.value = dados_senha;
    input_cpf.value = dados_cpf;
});

$("#form-editar").on("submit", function (e) {
    e.preventDefault();

    var id_editar = $("#inputId").val();
    var nome_editar = $("#inputNome").val();
    var usuario_editar = $("#inputUsuario").val();
    var senha_editar = $("#inputSenha").val();
    var cpf_editar = $("#inputCpf").val();
    var funcao_editar = $("#inputFuncao").val();


    var form_data = new FormData();
    form_data.append("id_editar", id_editar);
    form_data.append("nome_editar", nome_editar);
    form_data.append("usuario_editar", usuario_editar);
    form_data.append("senha_editar", senha_editar);
    form_data.append("cpf_editar", cpf_editar);
    form_data.append("funcao_editar", funcao_editar);


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



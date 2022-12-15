// MOSTRAR CATEGORIA

$(document).ready(function () {
    MostrarCategorias();
});

function MostrarCategorias() {
    var displayData = "true";
    $.ajax({
        url: "mostrarCategorias.php",
        type: "post",
        data: {
            mostrar: displayData,
        },

        success: function (data, status) {
            // console.log(status)
            $("#container").html(data);
        },
    });
}

// ADICIONAR CATEGORIA

$("#form").on("submit", function (e) {
    e.preventDefault();
    var nome = $("#nome").val();
    var imagem = document.getElementById("picture-input").files[0];
    var form_data = new FormData();
    form_data.append("file", imagem);
    form_data.append("nome", nome);

    $.ajax({
        url: "enviar.php",
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
                        $("#form-btn-close").click();
                        MostrarCategorias();
                    }
                });
        } else if (resultado == "categoria existente") {
            swal
                .fire({
                    icon: "error",
                    text: "Ops! Categoria já existe.",
                    type: "success",
                })
                .then((okay) => {
                    if (okay) {
                        $("#form-btn-close").click();
                        MostrarCategorias();
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
                        $("#form-btn-close").click();
                        MostrarCategorias();
                    }
                });
        }
    });
    $("#nome").val("");
    var inputFile = document.querySelector("#picture-input");
    var pictureImage = document.querySelector(".picture-image");
    var pictureImageTxt = "Escolha uma imagem";
    pictureImage.innerHTML = pictureImageTxt;
    document.getElementsByClassName("picture-img").remove();
});

// EDITAR CATEGORIA

const modal = document.getElementById("modalEditar");
modal.addEventListener("show.bs.modal", (event) => {
    const button = event.relatedTarget;

    const dados_Nome = button.getAttribute("data-bs-whateverNome");
    const dados_id = button.getAttribute("data-bs-whateverId");
    const dados_Img = button.getAttribute("data-bs-whateverImg");

    const inputNome = modal.querySelector("#nomeEditar");
    const inputId = modal.querySelector("#inputId");
    inputNome.value = dados_Nome;
    inputId.value = dados_id;
    var pictureImageEdit = document.querySelector(".picture-image-edit");
    const img = document.createElement("img");
    img.src = dados_Img;
    img.classList.add("picture-img");
    pictureImageEdit.innerHTML = "";
    pictureImageEdit.appendChild(img);
});

$("#btn-editar").click(function (e) {
    e.preventDefault();
    var nomeEditar = $("#nomeEditar").val();
    var idEditar = $("#inputId").val();
    var imagem = document.getElementById("picture-input-edit").files[0];
    var imgSrc = document.querySelector(".picture-image-edit").children[0].getAttribute("src");

    console.log(imgSrc);
    var form_data = new FormData();
    form_data.append("file", imagem);
    form_data.append("nomeEditar", nomeEditar);
    form_data.append("idEditar", idEditar);
    form_data.append("imgSrc", imgSrc);

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
                        MostrarCategorias();
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
                        MostrarCategorias();
                    }
                });
        }
    });
});

// DELETAR CATEGORIA

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
        MostrarCategorias();
    }, 200);

    $("#delet-btn-close").click();
});

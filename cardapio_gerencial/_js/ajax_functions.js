// MOSTRAR PRODUTO

$(document).ready(function () {
    MostrarProdutos();
    setInterval(function () {//Quando o documento estiver pronto, dê um setinvertal em qualquerCoisa()
        MostrarProdutos();
    }, 300000)
});

function MostrarProdutos() {
    var displayData = "true";
    $.ajax({
        url: "mostrar_produtos.php",
        type: "post",
        data: {
            mostrar: displayData,
        },

        success: function (data, status) {
            // console.log(status)
            $(".containeres").html(data);
        },
    });
}


// EDITAR PRODUTO

const modal = document.getElementById("modal-edit");
modal.addEventListener("show.bs.modal", (event) => {
    const button = event.relatedTarget;

    const dados_Nome_produto = button.getAttribute("data-bs-whateverNomeProduto");
    const dados_Nome_categoria = button.getAttribute("data-bs-whateverNomeCategoria");
    const dados_Valor_unitario = button.getAttribute("data-bs-whateverValorUnitario");
    const dados_Descricao = button.getAttribute("data-bs-whateverDescricao");
    const dados_Img = button.getAttribute("data-bs-whateverImg");
    const dados_id = button.getAttribute("data-bs-whateverId");



    const inputNome_produto = modal.querySelector("#nomeEditar");
    const inputNome_categoria = modal.querySelector("#categoriaEditar");
    const inputValor_unitario = modal.querySelector("#valorEditar");
    const inputDescricao = modal.querySelector("#descricaoEditar");
    const inputId = modal.querySelector("#idEditar");




    inputNome_produto.value = dados_Nome_produto;
    inputNome_categoria.value = dados_Nome_categoria;
    inputValor_unitario.value = dados_Valor_unitario;
    inputDescricao.value = dados_Descricao;
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

    const nomeEditar = document.getElementById("nomeEditar").value;
    const valorEditar = document.getElementById("valorEditar").value;
    const categoriaEditar = document.getElementById("categoriaEditar").value;
    const descricaoEditar = document.getElementById("descricaoEditar").value;
    const idEditar = document.getElementById("idEditar").value;

    var imagem = document.getElementById("picture-input-edit").files[0];
    var imgSrc = document.querySelector(".picture-image-edit").children[0].getAttribute("src");

    var form_data = new FormData();
    form_data.append("file", imagem);
    form_data.append("imgSrc", imgSrc);
    form_data.append("nomeProduto", nomeEditar);
    form_data.append("valor", valorEditar);
    form_data.append("nomeCategoria", categoriaEditar);
    form_data.append("descricao", descricaoEditar);
    form_data.append("idEditar", idEditar);


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
                        MostrarProdutos();
                        $("#edit-btn-close").click();

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
                        setTimeout(() => {
                            MostrarProdutos();
                        }, 200);
                    }
                });
        }
    });

});


// INATIVAR PRODUTO
const modal_inativar = document.getElementById("modal-inativar")
modal_inativar.addEventListener("show.bs.modal", (event) => {
    var button = event.relatedTarget;

    var id = button.getAttribute("data-bs-whateverIdInativar");
    var form_data = new FormData();
    form_data.append("idInativar", id);

    $("#inativar").click(function (e) {
        $.ajax({
            url: "inativar_produto.php",
            method: "POST",
            dataType: "json",
            processData: false,
            contentType: false,
            data: form_data,
        }).done(function (resultado) {
            MostrarProdutos()
            $("#inativo-btn-close").click();
        })

    });

})

// ATIVAR PRODUTO
const modal_ativar = document.getElementById("modal-ativar")
modal_ativar.addEventListener("show.bs.modal", (event) => {
    var button = event.relatedTarget;

    var id = button.getAttribute("data-bs-whateverIdAtivar");
    const inputIdAtivar = modal.querySelector("#IdAtivo");

    inputIdAtivar.value = id;

})

$("#ativar").click(function (e) {
    e.preventDefault();
    var form_data = new FormData();
    const IdAtivar = document.getElementById("IdAtivo").value;
    form_data.append("IdAtivo", id);

    $.ajax({
        url: "ativar_produto.php",
        method: "POST",
        dataType: "json",
        processData: false,
        contentType: false,
        data: form_data,
    }).done(function (resultado) {
        MostrarProdutos()
        $("#ativo-btn-close").click();


    })

});

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

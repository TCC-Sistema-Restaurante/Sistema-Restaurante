<?php
include "../_scripts/functions.php"
  ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pedidos Pendentes</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link href="_css/style.css" type="text/css" rel="stylesheet" />
  </head>

  <body>
    <nav class="mb-4">
      <img id="topSVG" src="_img/test.svg" alt="" />
      <img id="topImg" src="_img/image.png" alt="" />
    </nav>

    <section class="sec1">
      <h1 id="titulo" class="mb-4 d-flex justify-content-center">
        Pedidos Pendentes
      </h1>
      <div class="d-flex justify-content-center">
        <div class="containerInput">
          <span></span>
          <span></span>
          <div class="mb-3">
            <span class="inlineIcon">
              <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input
              type="text"
              class="form-control input-text"
              placeholder="Pesquisar Pedidos"
            />
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">


      </div>
    </section>
   
    <div class="modal t-modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content PrepararModal">
              <div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="boxPreparar">
              <div class="row">
                <div class="col-4 text-center parteEsquerdaPreparar">
                  <p>MESA</p>
                  <p id="mesaid"></p>
                  
                  <i class="fa-regular fa-clock"></i>
                  <p id="hora"></p>
                </div>

              <div class="col-8 parteDireitaPreparar">
                <h4 class="">Detalhes do Pedido</h4>
                <p id="prod"></p>
                
                <input type="text" hidden class="form form-control" name="idEditar" id="inputIdEdit" placeholder="Id">
                <button id="btnEntregar" class="mt-1 btnEntregarPreparar">Entregar</button>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>


<script src="https://code.jquery.com/jquery-3.6.1.js"></script>

    <script>
      $(document).ready(function () {
        MostrarPedidos();
    });

    function MostrarPedidos() {
    var displayData = "true";
    $.ajax({
        url: "exibirPedidos.php",
        type: "post",
        data: {
            mostrar: displayData,
        },

        success: function (data, status) {
            $(".container").html(data);
        },
    });
  };

    </script>

<script>


  const modal = document.getElementById("modal");

  modal.addEventListener("show.bs.modal", (event) => {
    const button = event.relatedTarget;
    const hora = button.getAttribute("data-bs-whateverHora");
    const id = button.getAttribute("data-bs-whatevermesaID");
    const prod = button.getAttribute("data-bs-whateverProdutos");

    document.getElementById("inputIdEdit").value = id
    document.getElementById("mesaid").innerText = id
    document.getElementById("hora").innerText = hora
    document.getElementById("prod").innerText = prod
  });

  // document.querySelectorAll(".btnEntregar").forEach(function(button) {
  //   button.addEventListener("click", function(event) {
  //   const el = event.target || event.srcElement;
  //   const id_mesa = el.id;
  //   $.ajax({
  //         type: "POST",
  //         url: "entregar.php",
  //         data: { id_mesa: id_mesa },
  //         dataType: "json",
  //     }).done(function (resultado) {
  //       if (resultado == "Entregue") {
  //           swal
  //               .fire({
  //                   icon: "success",
  //                   text: "Entregue com sucesso!",
  //                   type: "success",
  //               })
  //               .then((okay) => {
  //                   MostrarPedidos();
  //               });
  //       } else {
  //           swal
  //               .fire({
  //                   icon: "error",
  //                   text: "Ops! Houve um erro.",
  //                   type: "success",
  //               })
  //               .then((okay) => {
  //                 MostrarPedidos();
  //               });
  //         }
  //     })
  //   });
  // })

$(document).ready(function() {
    $("#btnPreparar").click(function (e) {
    var idEditar = $("#inputIdEdit").val();
      alert(idEditar)
      console(idEditar)

    function entregar(id){
      console.log(id)
    }

});
})

    // var form_data = new FormData();
    // form_data.append("file", imagem);
    // form_data.append("nomeEditar", nomeEditar);
    // form_data.append("idEditar", idEditar);
    // form_data.append("imgSrc", imgSrc);

    // $.ajax({
    //     url: "editar.php",
    //     method: "POST",
    //     dataType: "json",
    //     processData: false,
    //     contentType: false,
    //     data: form_data,
    // }).done(function (resultado) {
    //     if (resultado == "salvo!") {
    //         swal
    //             .fire({
    //                 icon: "success",
    //                 text: "Editado com sucesso!",
    //                 type: "success",
    //             })
    //             .then((okay) => {
    //                 if (okay) {
    //                     MostrarCategorias();
    //                     $("#edit-btn-close").click();

    //                 }
    //             });
    //     } else {
    //         swal
    //             .fire({
    //                 icon: "error",
    //                 text: "Ops! Houve um erro.",
    //                 type: "success",
    //             })
    //             .then((okay) => {
    //                 if (okay) {
    //                     $("#edit-btn-close").click();
    //                     setTimeout(() => {
    //                         MostrarCategorias();
    //                     }, 200);
    //                 }
    //             });
    //     }
    // });



  // document.querySelectorAll(".btnPreparar").forEach(function(button) {
  //     button.addEventListener("click", function(event) {
  //     const el = event.target || event.srcElement;
  //     const id_mesa = el.id;
  //     $.ajax({
  //           type: "POST",
  //           url: "preparar.php",
  //           data: { id_mesa: id_mesa },
  //           dataType: "json",
  //       })
  //   });
    
  // })
      </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
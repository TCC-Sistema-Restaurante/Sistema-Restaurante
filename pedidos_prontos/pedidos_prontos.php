<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pedidos Prontos</title>
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
    <nav class="mb-1">
      <img id="topSVG" src="_img/test.svg" alt="" />
      <h1 id="topText">Pedidos prontos</h1>
    </nav>

      <!-- Side bar -->
      <?php
    include"../menu_lateral/side_bar.php"
    ?>
    
    <section>
      <div class="container">

      </div>
    
    </section>
    <div class="modal-delet">
      <div class="modal t-modal fade" id="modalDeletar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <div>
                <button type="button" class="btn-close" id="delet-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            </div>
            <div class="modal-body">
              <div class="modal-delet">
                <span class="material-symbols-outlined"> question_mark </span>
                <h3>Entregar pedido?</h3>
                <input type="text" hidden class="form form-control" name="idEditar" id="inputIdEdit" placeholder="Id">
              </div>
            </div>
              <div class="modal-footer d-flex justify-content-center">
                <button id="deletar-item" class="btn btn-success">Entregar</button>
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
     <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>

    <script>
    $(document).ready(function () {
        MostrarPedidos();

      setInterval(function () {
        MostrarPedidos();
      }, 40000)
    });

    function MostrarPedidos() {
    var displayData = "true";
    $.ajax({
        url: "MostrarPedidos.php",
        type: "post",
        data: {
            mostrar: displayData,
        },

        success: function (data, status) {
            // console.log(status)
            $(".container").html(data);
        },
    });
  }

const modal_delet = document.getElementById("modalDeletar");

modal_delet.addEventListener("show.bs.modal", (event) => {
    const button = event.relatedTarget;
    const id_item = button.getAttribute("data-bs-whateverIdDelet");
    const inputId = $("#inputIdEdit");

    inputId.val(id_item);
});

$("#deletar-item").click(function (e) {
    var id_entregar = $("#inputIdEdit").val();

    $.ajax({
        type: "POST",
        url: "entregar.php",
        data: { id_entregar: id_entregar },
        dataType: "json",
    }).done(function (resultado) {
        if (resultado == "salvo!") {
            swal
                .fire({
                    icon: "success",
                    text: "Entregue com sucesso!",
                    type: "success",
                })
                .then((okay) => {
                    if (okay) {
                        MostrarPedidos();
                        $("#delet-btn-close").click();

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
                        $("#delet-btn-close").click();
                        setTimeout(() => {
                          MostrarPedidos();
                        }, 200);
                    }
                });
        }
    });
});

    </script>

  </body>
</html>

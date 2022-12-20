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
       
        <div class="box">
          <div class="row">
            <div class="col-4 text-center parteEsquerda">
              <i class="fa-regular fa-clock"></i>
              <p>16:42</p>
            </div>

            <div class="col-8 parteDireita">
              <div>
                <h2 class="">Mesa 03</h2>
                <button>X</button>
              </div>
              <p>Bife acebolado</p>
              <p>Hamburguer</p>
              <p>Pizza média:</p>
              <p>1/2 marguerita</p>
              <p>1/2 bolonhesa</p>
            </div>
          </div>
        </div>

      </div>
    
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>

    <script>
    $(document).ready(function () {
        MostrarPedidos();
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


  // const modal_delet = document.getElementById("modalDeletar");

  // modal_delet.addEventListener("show.bs.modal", (event) => {
  //     const button = event.relatedTarget;
  //     const id_mesa = button.getAttribute("data-bs-whateverIdmesa");
  //     const inputId = $("#inputIdEdit");

  //     inputId.val(id_mesa);
  // });

  $("#deletar-item").click(function (e) {
      var id_cancelar = $("#inputIdEdit").val();

      $.ajax({
          type: "POST",
          url: "entregar.php",
          data: { id_cancelar: id_cancelar },
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
                        MostrarPedidos();
                    }
                });
          }
      })

      setTimeout(() => {
          MostrarPedidos();
      }, 200);

      $("#delet-btn-close").click();
  });

    </script>

  </body>
</html>

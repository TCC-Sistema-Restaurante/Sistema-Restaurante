<?php
  include "../_scripts/functions.php"
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_css/cancelar_pedido.css" type="text/css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
    crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous"
    referrerpolicy="no-referrer"/>
    <title>Cancelar pedido</title>
</head>
<body>
    <nav class="mb-5">
        <img id="topSVG" src="_img/test.svg" alt="" />
        <h1 id="topText">Cancelar pedido</h1>
    </nav>
    <section>
    <div class="container_">
     
      </div>
    </section>

    <!-- Menu lateral -->
    <div class="side-bar">
      <div class="button-menu">
        <span class="material-symbols-outlined"> menu </span>
      </div>

      <div class="lateral-menu">
        <div class="itens" id="mesas">
          <img src="../menu_lateral/_img/mesas.png" id="icon-mesa" alt="" />
          <a href="../lista-mesas/mesas_garcom.php">Mesas</a>
        </div>
        <div class="itens" id="pedidos-pendentes">
          <img src="../menu_lateral/_img/carrinho.png" id="icon-carrinho" alt="" />
          <a href="../pedidos_prontos/index.html">
            Pedidos<br />
            prontos
          </a>
        </div>
        <div class="itens">
          <img src="../menu_lateral/_img/categorias.png" id="icon-categorias" alt="" />
          <a href="../cardapio_garcom/cardapio.php">Categorias</a>
        </div>
        <div class="categorias">
          <a href="#" id="pizzas">Pizzas</a>
          <a href="#" id="sanduiches">Sanduiches</a>
          <a href="#" id="sobremesas">Sobremesas</a>
          <a href="#" id="petiscos">Petiscos</a>
        </div>
      </div>
    </div>

       <!-- Modal deletar -->
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
            <span class="material-symbols-outlined"> warning </span>
            <h3>Tem certeza que deseja cancelar esse pedido?</h3>
            <input type="text" hidden class="form form-control" name="idEditar" id="inputIdEdit" placeholder="Id">
          </div>
        </div>
          <div class="modal-footer">
            <button id="deletar-item" class="btn btn-danger">Deletar</button>
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="../menu_lateral/_js/Script.js"></script>

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
            $(".container_").html(data);
        },
    });
  }


  const modal_delet = document.getElementById("modalDeletar");

  modal_delet.addEventListener("show.bs.modal", (event) => {
      const button = event.relatedTarget;
      const id_mesa = button.getAttribute("data-bs-whateverIdmesa");
      const inputId = $("#inputIdEdit");

      inputId.val(id_mesa);
  });

  $("#deletar-item").click(function (e) {
      var id_cancelar = $("#inputIdEdit").val();

      $.ajax({
          type: "POST",
          url: "cancelar.php",
          data: { id_cancelar: id_cancelar },
          dataType: "json",
      }).done(function (resultado) {
        if (resultado == "salvo!") {
            swal
                .fire({
                    icon: "success",
                    text: "Cancelado com sucesso!",
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


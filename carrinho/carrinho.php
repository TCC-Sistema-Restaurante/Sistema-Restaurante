<?php
if (isset($_SESSION['qtd'])) {
} else {
    $_SESSION['qtd'] = array();
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css" type="text/css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <title>Carrinho</title>
</head>

<body>
    <nav class="mb-1">
        <img id="topSVG" src="_img/test.svg" alt="" />
        <h1 id="topText">Carrinho</h1>
    </nav>

    <div class="text-center">
        <h2 style="color: #3A3A3A; font-size: 2.5em; margin-top: 60px !important; ">Resumo do Pedido</h2>
    </div>

    <section class="sec w-100">
        <div class="container-fluid">
            
                
            
        </div>

        
    </section>
    <form action="">
        <input type="submit" value="FINALIZAR" />
    </form>
    
    <div class="side-bar">
        <div class="button-menu">
          <span class="material-symbols-outlined"> menu </span>
        </div>
  
        <div class="lateral-menu">
          <div class="itens" id="mesas">
            <img src="../menu_lateral/_img/mesas.png" id="icon-mesa" alt="" />
            <a href="#">Mesas</a>
          </div>
          <div class="itens" id="pedidos-pendentes">
            <img src="../menu_lateral/_img/carrinho.png" id="icon-carrinho" alt="" />
            <a href="#">
              Pedidos<br />
              prontos
            </a>
          </div>
          <div class="itens">
            <img src="../menu_lateral/_img/categorias.png" id="icon-categorias" alt="" />
            <a href="#">Categorias</a>
          </div>
          <div class="categorias">
            <a href="#" id="pizzas">Pizzas</a>
            <a href="#" id="sanduiches">Sanduiches</a>
            <a href="#" id="sobremesas">Sobremesas</a>
            <a href="#" id="petiscos">Petiscos</a>
          </div>
        </div>
      </div>
  
      <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
      <script src="../menu_lateral/_js/Script.js"></script>
    <script>

        function menos(elemento){
            divPai = elemento.parentNode
            valorInput = divPai.children[1]
            InputNumber = divPai.children[3]
            num = parseInt(valorInput.textContent)
            if(num > 1){
                num--;
                InputNumber.value = num
                num = (num < 10) ? "0" + num : num;
                valorInput.innerText = num;
           }

        }

        function mais(elemento, id){
            divPai = elemento.parentNode
            valorInput = divPai.children[1]
            InputNumber = divPai.children[3]
            num = parseInt(valorInput.textContent)

                num++;
                InputNumber.value = num
                num = (num < 10) ? "0" + num : num;
                valorInput.innerText = num;

                MostrarCarrinho();

        }

       </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
     <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
    $(document).ready(function () {
        MostrarCarrinho();
    });

    function MostrarCarrinho() {
    var displayData = "true";
    $.ajax({
        url: "MostrarCarrinho.php",
        type: "post",
        data: {
            mostrar: displayData,
        },

        success: function (data, status) {
            // console.log(status)
            $(".container-fluid").html(data);
        },
    });
  }

// const modal_delet = document.getElementById("modalDeletar");

// modal_delet.addEventListener("show.bs.modal", (event) => {
//     const button = event.relatedTarget;
//     const id_item = button.getAttribute("data-bs-whateverIdDelet");
//     const inputId = $("#inputIdEdit");

//     inputId.val(id_item);
// });

// $("#deletar-item").click(function (e) {
//     var id_entregar = $("#inputIdEdit").val();

//     $.ajax({
//         type: "POST",
//         url: "entregar.php",
//         data: { id_entregar: id_entregar },
//         dataType: "json",
//     }).done(function (resultado) {
//         if (resultado == "salvo!") {
//             swal
//                 .fire({
//                     icon: "success",
//                     text: "Entregue com sucesso!",
//                     type: "success",
//                 })
//                 .then((okay) => {
//                     if (okay) {
//                         MostrarPedidos();
//                         $("#delet-btn-close").click();

//                     }
//                 });
//         } else {
//             swal
//                 .fire({
//                     icon: "error",
//                     text: "Ops! Houve um erro.",
//                     type: "success",
//                 })
//                 .then((okay) => {
//                     if (okay) {
//                         $("#delet-btn-close").click();
//                         setTimeout(() => {
//                           MostrarPedidos();
//                         }, 200);
//                     }
//                 });
//         }
//     });
// });
</script>
</body>

</html>



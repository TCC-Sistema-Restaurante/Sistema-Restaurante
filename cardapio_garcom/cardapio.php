<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="_css/cardapio.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
    <title>Cardápio</title>
  </head>
  <body>
    <nav class="mb-1">
      <img id="topSVG" src="_img/test.svg" alt="" />
      <h1 id="topText">Cardápio</h1>
    </nav>

      <!-- Side bar -->
      <?php
    include"../menu_lateral/side_bar.php"
    ?>


    <section class="cardapio">
      <div class="d-flex justify-content-center">
        <div class="containerInput">
          <span></span>
          <span></span>
          <div class="">
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
      <div class="container">
        <div class="item">
          <img src="https://receitinhas.com.br/wp-content/uploads/2016/12/hamburguer-1200x800.jpg" alt="" />
          <div>
            <h3>Hambúrguer</h3>
          </div>
        </div>
        <div class="item">
          <img src="https://img.itdg.com.br/tdg/images/blog/uploads/2022/07/5-itens-necessarios-para-se-tornar-um-pizzaiolo-neste-Dia-da-Pizza.jpg?mode=crop&width={:width=%3E150,%20:height=%3E130}" alt="" />
          <div>
            <h3>Pizza</h3>
          </div>
        </div>
        <div class="item">
          <img src="https://foodbase.com.br/storage/app/media/receitas/2021/01/sorvete-de-flocos-co.jpg" alt="" />
          <div>
            <h3>Sorvete</h3>
          </div>
        </div>
      </div>
    </section>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"
  ></script>
  </body>
</html>

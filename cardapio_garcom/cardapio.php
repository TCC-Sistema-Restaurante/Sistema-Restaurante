
<?php
  include "../_scripts/functions.php"
?>


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

          <?php 
            $url = $_SERVER["REQUEST_URI"];
            $id_categoria = explode('?', $url)[1];

              $categorias = categorias();
              while ($cardapioGarcom = $categorias ->fetch_array()) {
          ?>

     

          <div class="item">
            <a href="cardapio_pedido.php?<?= $cardapioGarcom["id"].'?'.$id_categoria?>"> 
            <img src= "<?= $cardapioGarcom['imagem']?>" alt="" />
            <div class="link">
               
              
                <h3><?= $cardapioGarcom['categoria']?></h3>
              </a>
            </div>
          </div>

        
          <?php } ?>
        
      </div>


    </section>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"
  ></script>
  </body>
</html>

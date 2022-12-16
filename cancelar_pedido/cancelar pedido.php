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
      <?php
        $lista_mesas = mesasPedidosPendentes();
        while ($ids_mesa = $lista_mesas->fetch_array()){
        ?>
        <div class="box mb-3">
          <div class="row">
            <div class="col-4 text-center parteEsquerda">
              <p>MESA</p>
              <p><?=$ids_mesa['id_mesa']?></p>
            </div>

            <div class="col-8 parteDireita">
              <h4 class="mt-3 mb-3">R$<?retornarPrecoPedidoaCancelar($ids_mesa['id_mesa'])?></h4>
              

              <h6>AGUARDANDO PREPARO</h6>
              <?php 
              $pedidos_pendentes = listarPedidosMesa($ids_mesa['id_mesa']);
              while ($pedido = $pedidos_pendentes->fetch_array()){ ?>
              
              <h7><?= retornarProduto($pedido['id_produtos'])?></h7>
              
              <?php } ?>
              <button class="mt-3">Cancelar</button>
                        
            </div>
          </div>
        </div>
        <?php } ?>
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
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="../menu_lateral/_js/Script.js"></script>

</body>
</html>

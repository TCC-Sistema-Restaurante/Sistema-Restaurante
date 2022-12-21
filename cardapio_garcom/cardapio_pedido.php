
<?php
  include "../_scripts/functions.php"
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="_css/cardapio_pedido.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <title>Pedido Pizza</title>
  </head>
  <body>

    <nav class="mb-1">
      <img id="topSVG" src="_img/test.svg" alt="" />
      <h1 id="topText"> 
        
      <?php
            include "../_scripts/config.php";
            $idCategoria = $_GET['id'];  
            if(!isset($_SESSION)){
              session_start();
            }

            $_SESSION['id_categoria'] = $idCategoria;

            $sql = "SELECT categoria FROM categoria WHERE id = '$idCategoria' "; 
            $query = $mysqli->query($sql);
            $dados = $query->fetch_array();
            echo ucwords( $dados['categoria'] ); 
      ?>
      
      </h1>
    </nav>
    
    <section class="pedido">
      <a href="cardapio.php">voltar para categorias</a>
      <form action="">

        <div class="flavor">
          <h3>Escolha os sabores:</h3>
          <div class="search-bar">
            <input type="text" id="txt-search" placeholder="Buscar..." />
            <span class="material-symbols-outlined"> search </span>
          </div>

            <div id="container">
              
            </div>
            
          
        </div>
        


      </form>
    </section>

    <form  action="">
      <input type="submit" value="Avançar" />
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
          <a href="cardapio.php">Categorias</a>
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
    <script src="_js/ajax_functions.js"></script>
  </body>
</html>

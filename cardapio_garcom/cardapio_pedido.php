<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="_css/cardapio_pedido.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <title>Pedido Pizza</title>
  </head>
  <body>
    <nav class="mb-1">
      <img id="topSVG" src="_img/test.svg" alt="" />
      <h1 id="topText">Pedido</h1>
    </nav>
    <!-- Side bar -->
    <?php
    include"../menu_lateral/side_bar.php"
    ?>
    <section class="pedido">
      <a href="#">voltar para categorias</a>
      <form action="" method="POST">
        <div class="flavor">
          <h3>Escolha os produtos:</h3>
          <!-- ITEM -->
          
          <?php
          include "../_scripts/config_pdo.php";

            $url = $_SERVER["REQUEST_URI"];
            
            $id_categoria = explode('?', $url)[1];
            $id_mesa = explode('?', $url)[2];

            
            
            $query = ("SELECT b.id ,b.nome_produto,b.valor_unitario,b.descricao
                FROM categoria as a
                RIGHT JOIN produto as b
                on a.id = b.categoria_id
                WHERE b.status = 'ativo' and a.id = $id_categoria");

            $statement = $pdo->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $rowCount = $statement->rowCount();

            if ($rowCount > 0) {

                foreach($result as $row) {
                    echo'
                        <label for="flavor'.$row["id"].'" class="item">
                            <div>
                            <input type="checkbox" name="check-flavor[]" value="'.$row["id"].'" id="flavor'.$row["id"].'" />
                            <span class="checkmark"></span>
                            <div>
                                <h4>'.$row["nome_produto"].'</h4>
                                <h5>R$'.$row["valor_unitario"].',00</h5>
                            </div>
                            </div>
                            <p>
                            '.$row["descricao"].'
                            </p>
                        </label>
                        ';
                }
                
        }

          ?>
          <!-- ITEM -->
          
        </div>
        <input type="submit" value="Avançar" />
        
      </form>
    </section>

    <?php
// Verifica se usuário escolheu algum número
if(isset($_POST["check-flavor"])){
    
$_SESSION["mesa-$id_mesa"] = array();
$categoria.'_'.$id_categoria = array();
    // Faz loop pelo array dos numeros
    foreach($_POST["check-flavor"] as $numero)
    {
        array_push($categoria_id_categoria, $numero);
    }
    array_push($_SESSION["mesa-$id_mesa"],$categoria_id_categoria);
    print_r($_SESSION);
}
else
{
    echo "Você não escolheu número preferido!<br>";
}

?>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="_js/ajax_functions.js"></script>
    <script src="_js/script.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  </body>
</html>

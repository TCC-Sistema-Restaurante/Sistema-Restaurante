

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

        <a href="../lista-mesas/mesas_garcom.php">FINALIZAR</a>
    </section>

    
    

    <?php
      include"../menu_lateral/side_bar.php"
    ?>

    <?php

    ?>

      <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
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
<?php
    if (isset($_GET['id_mesa'])) {
    $id_produto = $_GET["produtos"];
    $quantidade = $_GET["quantidade"];
    $carrinho = '<div class="table-responsive-md">
    <table class="table">
        <thead>
            <tr>
                <th>Descrição</th>
                <th class="d-flex justify-content-center" >Quantidade</th>
                <th>Valor unitário</th>
                <th ></th>
            </tr>
        </thead>
        <tbody>';

        
          include "../_scripts/config.php";
          $sql = "SELECT * FROM produto where id = '$id_produto'";
          $query = $mysqli->query($sql);
          $dados = $query->fetch_assoc();

        $carrinho .=  '<tr>
        <td>'.$dados['nome_produto'].'</td>
        <td class="d-flex justify-content-center">
           
                <h5>'.$quantidade.'</h5>
    
        </td>
        <td>'.$dados['valor_unitario'].'</td>
        <td>
            <button type="button" class="tableBtn tableBtnEditar">
            <input type="hidden" name="apagar" value="'.$dados['id'].'">
              <i class="bx bx-trash"></i>                  
            </button>
        </td>
    </tr>';

    


     


          $carrinho .= '</tbody>
          </table>
      </div>

      <div class="row mt-2" style="margin-bottom: 70px;">
          <div class="col-6" >
              <span style="color: #3A3A3A; font-size: 2em; margin-left: 20px;">Total</span>
          </div>
          <div class="col-6 text-end">
              <span style="color: #3A3A3A; font-size: 2em; margin-right: 20px;">R$'.number_format($dados['valor_unitario']*$quantidade, 2).'</span>
          </div>
      </div>';
    } echo $carrinho;
?>
</body>

</html>



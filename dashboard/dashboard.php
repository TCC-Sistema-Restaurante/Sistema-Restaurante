<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/dashboard.css">
  <!-- CSS only -->
  <!-- JavaScript Bundle with Popper -->
  <link href="../nav_bar/_CSS/nav.css" type="text/css" rel="stylesheet" >

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
  <title>Dashboard</title>
</head>

<body>

<?php
    include "../nav_bar/nav.php";
?>

  <section class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="" id="cards-cash">
            <div class="card">
              <div class="sing">
                <h2>$</h2>
              </div>
              <div class="card-body">
                <h3>12.054</h3>
                Total de vendas
              </div>
            </div>
            <div class="card">
              <div class="sing">
                <h2>$</h2>
              </div>
              <div class="card-body">
                <h3>24.000</h3>
                Faturamento
              </div>
            </div>
            <div class="card">
              <div class="sing">
                <h2>$</h2>
              </div>
              <div class="card-body">
                <h3>4000</h3>
                Despesas
              </div>
            </div>
            <div class="card">
              <div class="sing">
                <h2>$</h2>
              </div>
              <div class="card-body">
                <h3>800</h3>
                Impostos
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-9 grafico">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="true">
            <div class="carousel-inner">
              <div class="carousel-item active " data-bs-interval="100000">
                <div class="carouselCard" >

                  <div class="card-body p-1">
                    <h5>Pratos mais vendidos</h5>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <?php include_once "./graficos/coluna.php"; ?>
                  <div id="coluna"></div>
                </div>
              </div>
              <div class="carousel-item" data-bs-interval="100000">
                <div class="carouselCard" >
                  <div class="card-body p-1">
                    <h5>Pratos mais famosos</h5>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                <?php include_once "./graficos/pizza.php"; ?>
                  <div id="pizza"></div>
                </div>
              </div>

              <div class="carousel-item" data-bs-interval="100000">
                <div class="carouselCard" >
                  <div class="card-body p-1">
                    <h5>Pratos mais famosos</h5>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <?php include_once "./graficos/barra.php"; ?>
                  <div id="barra"></div>

                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
              data-bs-slide="prev">
              <span class="prevBtn"><i class="bx bx-chevron-left"  aria-hidden="true"></i></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
              data-bs-slide="next">
              <span class="nextBtn"><i class="bx bx-chevron-right"  aria-hidden="true"></i></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          </head>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
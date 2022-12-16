<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="_css/style.css" type="text/css" />
    <title>Mesas</title>
  </head>

  <body>
    <!--navbar-->
    <nav class="mb-1">
      <img id="topSVG" src="_img/test.svg" alt="" />
      <h1 id="topText">Mesas</h1>
    </nav>

    <!-- Side bar -->
    <?php
    include"../menu_lateral/side_bar.php"
    ?>

    <!-- barra de pesquisa-->
    <div class="mx-auto" id="barra_pesquisa">
      <div class="col-md-10 mx-auto mt-5">
        <input
          type="text"
          class="form-control py-2 px-4 shadow-lg p-3 mb-5 bg-body rounded"
          id="texto"
          placeholder="Encontrar mesa"
        />
      </div>
    </div>

    <!--Inicio Acordeão-->
    <div id="acordeao" style="margin-bottom: 10rem">
      <div class="container">
        <div class="col-md-12">
          <div
            class="accordion accordion-flush d-grid gap-4"
            id="accordionFlushExample"
          >
            
            
          </div>
        </div>
      </div>
    </div>

    <!--Final do acordião-->

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="_js/ajax_functions.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>

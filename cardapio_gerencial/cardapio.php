<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="_css/cardapio.css" />
    <link rel="stylesheet" href="_css/modals.css" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
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
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Cardápio</title>
  </head>
  <body>

    <?php include "../nav_bar/nav.php";?>

    <section class="cardapio">
      <h1>Cardápio</h1>

      <div class="bar">
        <!-- Barra de pesquisa -->
        <div class="search-bar">
          <span class="material-symbols-outlined"> search </span>
          <input type="text" id="txt-search" placeholder="Buscar..." />
        </div>

        <!-- Btn Add -->
        <button
          class="NovoBtn"
          data-bs-toggle="modal"
          data-bs-target="#modal-add"
        >
          <h3>Add</h3>
          <span class="material-symbols-outlined"> add </span>
        </button>
      </div>

      <div class="container">
        <!-- Item -->
        <div class="item">
          <div class="image">
            <img src="_img/img_exemple.png" alt="foto-item" width="100%" />
            <div class="edit-delet">
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-edit"
              >
                <span class="material-symbols-outlined"> border_color </span>
              </button>
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-delet"
              >
                <span class="material-symbols-outlined"> cancel </span>
              </button>
            </div>
            <h3 class="name">Hamburger</h3>
          </div>
          <h4 class="description">
            Pão da casa, carne ao ponto, molho agre doce,carne ao ponto, queijo
            prato, gergelin, queijo prato, cebola, molho agre doce.
          </h4>
          <h2 class="price">R$ 20,00</h2>
        </div>
        <!-- Item -->
        <div class="item">
          <div class="image">
            <img src="_img/img_exemple.png" alt="foto-item" width="100%" />
            <div class="edit-delet">
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-edit"
              >
                <span class="material-symbols-outlined"> border_color </span>
              </button>
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-delet"
              >
                <span class="material-symbols-outlined"> cancel </span>
              </button>
            </div>
            <h3 class="name">Hamburger</h3>
          </div>
          <h4 class="description">
            Pão da casa, carne ao ponto, molho agre doce,carne ao ponto, queijo
            prato, gergelin, queijo prato, cebola, molho agre doce.
          </h4>
          <h2 class="price">R$ 20,00</h2>
        </div>
        <!-- Item -->
        <div class="item">
          <div class="image">
            <img src="_img/img_exemple.png" alt="foto-item" width="100%" />
            <div class="edit-delet">
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-edit"
              >
                <span class="material-symbols-outlined"> border_color </span>
              </button>
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-delet"
              >
                <span class="material-symbols-outlined"> cancel </span>
              </button>
            </div>
            <h3 class="name">Hamburger</h3>
          </div>
          <h4 class="description">
            Pão da casa, carne ao ponto, molho agre doce,carne ao ponto, queijo
            prato, gergelin, queijo prato, cebola, molho agre doce.
          </h4>
          <h2 class="price">R$ 20,00</h2>
        </div>
        <!-- Item -->
        <div class="item">
          <div class="image">
            <img src="_img/img_exemple.png" alt="foto-item" width="100%" />
            <div class="edit-delet">
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-edit"
              >
                <span class="material-symbols-outlined"> border_color </span>
              </button>
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-delet"
              >
                <span class="material-symbols-outlined"> cancel </span>
              </button>
            </div>
            <h3 class="name">Hamburger</h3>
          </div>
          <h4 class="description">
            Pão da casa, carne ao ponto, molho agre doce,carne ao ponto, queijo
            prato, gergelin, queijo prato, cebola, molho agre doce.
          </h4>
          <h2 class="price">R$ 20,00</h2>
        </div>
        <!-- Item -->
        <div class="item">
          <div class="image">
            <img src="_img/img_exemple.png" alt="foto-item" width="100%" />
            <div class="edit-delet">
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-edit"
              >
                <span class="material-symbols-outlined"> border_color </span>
              </button>
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-delet"
              >
                <span class="material-symbols-outlined"> cancel </span>
              </button>
            </div>
            <h3 class="name">Hamburger</h3>
          </div>
          <h4 class="description">
            Pão da casa, carne ao ponto, molho agre doce,carne ao ponto, queijo
            prato, gergelin, queijo prato, cebola, molho agre doce.
          </h4>
          <h2 class="price">R$ 20,00</h2>
        </div>
        <!-- Item -->
        <div class="item">
          <div class="image">
            <img src="_img/img_exemple.png" alt="foto-item" width="100%" />
            <div class="edit-delet">
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-edit"
              >
                <span class="material-symbols-outlined"> border_color </span>
              </button>
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-delet"
              >
                <span class="material-symbols-outlined"> cancel </span>
              </button>
            </div>
            <h3 class="name">Hamburger</h3>
          </div>
          <h4 class="description">
            Pão da casa, carne ao ponto, molho agre doce,carne ao ponto, queijo
            prato, gergelin, queijo prato, cebola, molho agre doce.
          </h4>
          <h2 class="price">R$ 20,00</h2>
        </div>


      </div>
    </section>

    <!-- Modal -->

    <?php include"modal_add.php";?>
    <?php include"modal_edit.php";?>
    <?php include"modal_delet.php";?>
  </body>
  <script src="../modals/_js/script.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"
  ></script>
</html>